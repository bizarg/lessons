<?php

// @codingStandardsIgnoreStart

/**
 * @api {get} /api/roles List
 * @apiVersion 1.0.0
 * @apiName api.roles.index
 * @apiGroup Role
 *
 * @apiParam {String} [filter[query]] query string by
 * @apiParam {Integer} [page[number]] page
 * @apiParam {Integer} [page[size]] items on page
 * @apiParam {String="createdAt"} [sort] example: -createdAt desc, createdAt asc
 *
 * @apiSuccess {object[]} data Data
 * @apiUse RoleResource
 *
 * @apiUse RoleResourceCollectionExample
 * @apiUse Authorization
 * @apiUse UNAUTHORIZED
 *
 */

/**
 * @api {get} /api/roles/:id Get
 * @apiVersion 1.0.0
 * @apiName api.roles.show
 * @apiGroup Role
 *
 * @apiSuccess {object} data Data
 * @apiUse RoleResource
 *
 * @apiUse RoleResourceExample
 *
 * @apiUse Authorization
 * @apiUse UNAUTHORIZED
 * @apiUse NotFound
 */

/**
 * @api {post} /api/roles Store
 * @apiVersion 1.0.0
 * @apiName api.roles.store
 * @apiGroup Role
 *
 * @apiParam {Integer} title
 *
 * @apiSuccess {object} data Data
 * @apiUse RoleResource
 *
 * @apiUse RoleResourceExample
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
 * @api {put} /api/roles/:id Update
 * @apiVersion 1.0.0
 * @apiName api.roles.update
 * @apiGroup Role
 *
 * @apiParam {String} title
 * @apiParam {Integer} number
 *
 * @apiSuccess {object} data Data
 * @apiUse RoleResource
 *
 * @apiUse RoleResourceExample
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
 * @api {delete} /api/roles/:id Delete
 * @apiVersion 1.0.0
 * @apiName api.roles.destroy
 * @apiGroup Role
 *
 * @apiUse NO_CONTENT
 * @apiUse Authorization
 * @apiUse NotFound
 * @apiUse UNAUTHORIZED
 *
 */

/**
 * @apiDefine RoleResource
 * @apiVersion 1.0.0
 *
 * @apiSuccess {String}   data.type Role type
 * @apiSuccess {Integer}  data.id Role id
 * @apiSuccess {Object}   data.attributes Role attributes
 * @apiSuccess {String}   data.attributes.createdAt Role attribute
 * @apiSuccess {String}   data.attributes.updatedAt Role attribute
 *
 */

/**
 * @apiDefine RoleResourceExample
 *
 * @apiSuccessExample Success-Response:
 *     HTTP/1.1 200 Ok
 *     {
 *         "data":
 *         {
 *              "type": "role",
 *              "id": 3,
 *              "attributes": {
 *                  "createdAt": "2020-07-23 02:24:48",
 *                  "updatedAt": "2020-07-23 02:24:48"
 *              },
 *         }
 *     }
 */

/**
 * @apiDefine RoleResourceCollectionExample
 *
 * @apiSuccessExample Success-Response:
 *     HTTP/1.1 200 Ok
 *     {
 *         "data": [
 *         {
 *              "type": "role",
 *              "id": 3,
 *              "attributes": {
 *                  "createdAt": "2020-07-23 02:24:48",
 *                  "updatedAt": "2020-07-23 02:24:48"
 *              },
 *         }
 *     ]}
 *
 */
