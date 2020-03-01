<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Maxsize implements Rule
{
    private $max_size = 102400;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $size = $value->getSize();
        $this->max_size = $this->maxSize();
        return boolval($size <= $this->max_size);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Uploaded file size exceeded maximum allowed of 2MB';
    }

    public function maxSize(){
        $output = `grep /etc/httpd/conf/httpd.conf LimitRequestBody`;
        if (!$output) {
            $output = $this->convertToBytes(ini_get('upload_max_filesize'));

        }
        return $output;
    }

    private  function convertToBytes(string $from): ?int {
        $units = ['B', 'K', 'M', 'G', 'T', 'P'];
        $number = substr($from, 0, -1);
        $suffix = strtoupper(substr($from,-1));

            //B or no suffix
        if(is_numeric(substr($suffix, 0, 1))) {
            return preg_replace('/[^\d]/', '', $from);
        }

        $exponent = array_flip($units)[$suffix] ?? null;
        if($exponent === null) {
            return null;
        }

        return $number * (1024 ** $exponent);

    }
}
