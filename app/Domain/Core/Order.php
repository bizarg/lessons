<?php

namespace App\Domain\Core;

use Illuminate\Http\Request;

/**
 * Class Order
 * @package App\Domain\Core
 */
class Order implements \Bizarg\Repository\Contract\Order
{
    /**
     * Define sort
     * @type string
     */
    public const SORT_ASC = 'asc';
    /**
     * Define sort
     * @type string
     */
    public const SORT_DESC = 'desc';
    /**
     * Define sort field
     * @type string
     */
    public const SORT_FIELD = 'createdAt';

    /**
     * @var string
     */
    private string $field = '';

    /**
     * @var string
     */
    private string $direction = '';

    /**
     * @return string
     */
    public function field()
    {
        return $this->field;
    }

    /**
     * @param string $field
     *
     * @return $this
     */
    public function setField($field)
    {
        $this->field = $field;

        return $this;
    }

    /**
     * @return string
     */
    public function direction()
    {
        return $this->direction;
    }

    /**
     * @param string $direction
     *
     * @return $this
     */
    public function setDirection($direction)
    {
        $this->direction = $direction;

        return $this;
    }

    /**
     * @param Request $request
     * @param array $allowedFields
     * @param string $defaultSortField
     * @param string $direction
     * @param string $sortParam
     * @return $this
     */
    public static function fromRequest(
        Request $request,
        array $allowedFields,
        $defaultSortField = self::SORT_FIELD,
        $direction = self::SORT_ASC,
        $sortParam = 'sort'
    ) {
        $param = $request->get($sortParam);

        if (substr($param, 0, 1) == '-') {
            $direction = self::SORT_DESC;
            $param = ltrim($param, '-');
        }

        $sortField = !in_array($param, array_keys($allowedFields))
            ? $allowedFields[$defaultSortField] ?? 'created_at'
            : $allowedFields[$param];

        return (new self())
            ->setField($sortField)
            ->setDirection($direction);
    }
}
