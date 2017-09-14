<?php
class Upload {
    public static $error;

    public function uploadAction($file, $allow, $path, $maxsize = 2097152)
    {
        switch ($file['error']) {
            case 1: self::$error = 'Upload failed, file is over the size limit.';
                return false;
            case 2:
                self::$error = 'Upload failed, file is over the browser limit.';
                return false;
            case 3:
                self::$error = 'Upload failed, file is missing part.';
                return false;
            case 4:
                self::$error = 'Upload failed, please select your file.';
                return false;
            case 6:
            case 7:
            self::$error = 'Server is busy, please try again.';
            return false;
        }
        if($file['size']> $maxsize) {
            self::$error='Upload failed, file is over the size limit. Size maximum is: '.$maxsize . 'bytes';
            return false;
        }
        if(!in_array($file['type'], $allow)) {
            self::$error = 'File format is incorrect, accept format is: ' . implode(',', $allow);
            return false;
        }
        $newname = $this->randName($file['name']);
        $target = trim($path).'/'.$newname;
        if(move_uploaded_file($file['tmp_name'], $target)) {
            return trim($newname);
        } else {
            self::$error = 'Unknown error, upload failed.';
            return false;
        }
    }

    private function randName($filename)
    {
        $newname = date('YmdHis');
        $str = '12345678901234567890';
        for ($i=0;$i<6;$i++) {
            $newname .= $str[mt_rand(0,strlen($str)-1)];
            $newname .= strrchr($filename, '.');
            return $newname;
        }
    }
}