<?php

namespace Engine;

use Engine\DI\DI;

class Load
{
    const MASK_MODEL_REPOSITORY = '\%s\Model\%s\%sRepository';

    const FILE_MASK_LANGUAGE = 'Language/%s/%s.ini';

    /**
     * @var \Engine\DI\DI
     */
    public $di;

    /**
     * Load constructor
     * @param \Engine\DI\DI $di
     */
    public function __construct(DI $di)
    {
        $this->di = $di;

        return $this;
    }

    /**
     * @param $modelName
     * @param boolean $modelDir
     * @return boolean
     */
    public function model($modelName, $modelDir = false)
    {
        $modelName = ucfirst($modelName);
        $modelDir = $modelDir ? $modelDir : $modelName;

        $namespaceModel = sprintf(
            self::MASK_MODEL_REPOSITORY,
            ENV, $modelDir, $modelName
        );

        $isClassModel = class_exists($namespaceModel);

        if ($isClassModel) {
            // $this->di->push('model', [
            //     'key' => lcfirst($modelName),
            //     'value' => new $namespaceModel($this->di)
            // ]);

            // Set to DI
            // $modelRegistry = $this->di->get('model') ?: new \stdClass();
            $modelRegistry = new \stdClass();
            $modelRegistry->{lcfirst($modelName)} = new $namespaceModel($this->di);

            $this->di->set('model', $modelRegistry);
        }

        return $isClassModel;
    }

    /**
     * @param string $path Format: [a-z0-9/_]
     * @return array
     */
    public function language($path)
    {
        $file = sprintf(self::FILE_MASK_LANGUAGE, 'english', $path);

        $content = parse_ini_file($file, true);

        // Set to DI
        $languageName = $this->toCamelCase($path);

        $language = $this->di->get('language') ?: new \stdClass();
        $language->{$languageName} = $content;

        $this->di->set('language', $language);

        return $content;
    }

    /**
     * @param string $str
     * @return string
     */
    private function toCamelCase($str)
    {
        $replace = preg_replace('/[^a-zA-Z0-9]/', ' ', $str);
        $convert = mb_convert_case($replace, MB_CASE_TITLE);
        $result = lcfirst(str_replace(' ', '', $convert));

        return $result;
    }
}
