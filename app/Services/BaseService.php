<?php
namespace App\Services;

use App\Base\Interfaces\BaseServiceInterface;

abstract class BaseService implements BaseServiceInterface
{
    protected $servicePath;
    protected $collection;

    protected function _transformData($transformName, array $data)
    {
        try {
            $transform = $this->servicePath . '\Transforms\\' . $transformName;
            return $transform::getTransformedData($data);
        } catch (Exception $exception) {
            throw new Exception(__($exception->getMessage()));
        }
    }

    public function insertLog($data)
    {
        try {
            $dataTransform = $this->_transformData('InsertDataLogTransform', ['dataRequest' => $data]);
            return $this->collection->insert($dataTransform);
        } catch (\Exception $exception) {
            throw new Exception(__($exception->getMessage()));
        }
    }
}