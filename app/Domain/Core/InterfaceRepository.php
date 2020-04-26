<?php

namespace App\Domain\Core;

use Illuminate\Database\Eloquent\Model;
use Exception;

/**
 * Interface InterfaceRepository
 * @package Api\Domain\Core
 */
interface InterfaceRepository
{
    /**
     * @param Filter $filter
     * @param Pagination|null $pagination
     * @param Order|null $leadOrder
     * @return mixed
     */
    public function all(Filter $filter, ?Pagination $pagination = null, ?Order $leadOrder = null);

    /**
     * @param int $id
     * @return Model
     */
    public function byId(int $id);

    /**
     * @param Model $lead
     */
    public function store(Model $lead);

    /**
     * @param Model $lead
     */
    public function delete(Model $lead);

    /**
     * @param mixed $value
     * @param string $field
     * @return Model|null
     */
    public function byField($value, $field);

    /**
     * @param array $ids
     * @throws Exception
     */
    public function deleteByIds($ids);

    /**
     * @param string $field
     * @param array $array
     * @throws Exception
     */
    public function deleteByField($field, $array);
}
