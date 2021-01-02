<?php

// @codingStandardsIgnoreStart

/**
 * @api {get} /api/categories List
 * @apiVersion 1.0.0
 * @apiName api.categories.index
 * @apiGroup Category
 *
 * @apiParam {String} [filter[query]] query string by
 * @apiParam {Integer} [page[number]] page
 * @apiParam {Integer} [page[size]] items on page
 * @apiParam {String="createdAt"} [sort] example: -createdAt desc, createdAt asc
 *
 * @apiSuccess {object[]} data Data
 * @apiUse CategoryResource
 *
 * @apiUse CategoryResourceCollectionExample
 * @apiUse Authorization
 * @apiUse UNAUTHORIZED
 *
 */

/**
 * @api {get} /api/categories/:id Get
 * @apiVersion 1.0.0
 * @apiName api.categories.show
 * @apiGroup Category
 *
 * @apiSuccess {object} data Data
 * @apiUse CategoryResource
 *
 * @apiUse CategoryResourceExample
 *
 * @apiUse Authorization
 * @apiUse UNAUTHORIZED
 * @apiUse NotFound
 */

/**
 * @api {post} /api/categories Store
 * @apiVersion 1.0.0
 * @apiName api.categories.store
 * @apiGroup Category
 *
 * @apiParam {Integer} title
 *
 * @apiSuccess {object} data Data
 * @apiUse CategoryResource
 *
 * @apiUse CategoryResourceExample
 *
 * @apiUse Success
 * @apiUse Authorization
 * @apiUse Error
 * @apiUse NotFound
 * @apiUse INTERNAL_SERVER_ERROR
 * @apiUse UNAUTHORIZED
 * @apiUse FORBIDDEN
 *
 */

/**
 * @api {put} /api/categories/:id Update
 * @apiVersion 1.0.0
 * @apiName api.categories.update
 * @apiGroup Category
 *
 * @apiParam {String} title
 * @apiParam {Integer} number
 *
 * @apiSuccess {object} data Data
 * @apiUse CategoryResource
 *
 * @apiUse CategoryResourceExample
 *
 * @apiUse Success
 * @apiUse Authorization
 * @apiUse Error
 * @apiUse NotFound
 * @apiUse INTERNAL_SERVER_ERROR
 * @apiUse UNAUTHORIZED
 * @apiUse FORBIDDEN
 *
 */

/**
 * @api {delete} /api/categories/:id Delete
 * @apiVersion 1.0.0
 * @apiName api.categories.destroy
 * @apiGroup Category
 *
 * @apiUse NO_CONTENT
 * @apiUse Authorization
 * @apiUse NotFound
 * @apiUse UNAUTHORIZED
 *
 */

/**
 * @apiDefine CategoryResource
 * @apiVersion 1.0.0
 *
 * @apiSuccess {String}   data.type Category type
 * @apiSuccess {Integer}  data.id Category id
 * @apiSuccess {Object}   data.attributes Category attributes
 * @apiSuccess {String}   data.attributes.createdAt Category attribute
 * @apiSuccess {String}   data.attributes.updatedAt Category attribute
 *
 */

/**
 * @apiDefine CategoryResourceExample
 *
 * @apiSuccessExample Success-Response:
 *     HTTP/1.1 200 Ok
 *     {
 *         "data":
 *         {
 *              "type": "category",
 *              "id": 3,
 *              "attributes": {
 *                  "createdAt": "2020-07-23 02:24:48",
 *                  "updatedAt": "2020-07-23 02:24:48"
 *              },
 *         }
 *     }
 */

/**
 * @apiDefine CategoryResourceCollectionExample
 *
 * @apiSuccessExample Success-Response:
 *     HTTP/1.1 200 Ok
 *     {
 *         "data": [
 *         {
 *              "type": "category",
 *              "id": 3,
 *              "attributes": {
 *                  "createdAt": "2020-07-23 02:24:48",
 *                  "updatedAt": "2020-07-23 02:24:48"
 *              },
 *         }
 *     ]}
 *
 */
