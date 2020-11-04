<?php

namespace Facebook\WebDriver\Remote;

class LocalFileDetector implements FileDetector
{
    /**
     * @var null|string  $tmp_dir  A directory for storing temporary files.
     */
    private $tmp_dir = null;

    /**
     * @param null|string $tmp_dir An optional alternative for storing temporary files.
     */
    public function __construct($tmp_dir = null) {
        $this->tmp_dir = $tmp_dir;
    }

    /**
     * @return string Get the directory path for storing temporary files.
     */
    public function getTmpDir() {
        return $this->tmp_dir ?? sys_get_temp_dir();
    }

    /**
     * @param string $file
     *
     * @return null|string
     */
    public function getLocalFile($file)
    {
        if (is_file($file)) {
            return realpath($file);
        }

        return null;
    }
}
