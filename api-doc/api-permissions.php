<?php

// @codingStandardsIgnoreStart

/**
 * @api {get} /api/permissions List
 * @apiVersion 1.0.0
 * @apiName api.permissions.index
 * @apiGroup Permission
 *
 * @apiParam {String} [filter[query]] query string by
 * @apiParam {Integer} [page[number]] page
 * @apiParam {Integer} [page[size]] items on page
 * @apiParam {String="createdAt"} [sort] example: -createdAt desc, createdAt asc
 *
 * @apiSuccess {object[]} data Data
 * @apiUse PermissionResource
 *
 * @apiUse PermissionResourceCollectionExample
 * @apiUse Authorization
 * @apiUse UNAUTHORIZED
 *
 */

/**
 * @api {get} /api/permissions/:id Get
 * @apiVersion 1.0.0
 * @apiName api.permissions.show
 * @apiGroup Permission
 *
 * @apiSuccess {object} data Data
 * @apiUse PermissionResource
 *
 * @apiUse PermissionResourceExample
 *
 * @apiUse Authorization
 * @apiUse UNAUTHORIZED
 * @apiUse NotFound
 */

/**
 * @api {post} /api/permissions Store
 * @apiVersion 1.0.0
 * @apiName api.permissions.store
 * @apiGroup Permission
 *
 * @apiParam {Integer} title
 *
 * @apiSuccess {object} data Data
 * @apiUse PermissionResource
 *
 * @apiUse PermissionResourceExample
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
 * @api {put} /api/permissions/:id Update
 * @apiVersion 1.0.0
 * @apiName api.permissions.update
 * @apiGroup Permission
 *
 * @apiParam {String} title
 * @apiParam {Integer} number
 *
 * @apiSuccess {object} data Data
 * @apiUse PermissionResource
 *
 * @apiUse PermissionResourceExample
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
 * @api {delete} /api/permissions/:id Delete
 * @apiVersion 1.0.0
 * @apiName api.permissions.destroy
 * @apiGroup Permission
 *
 * @apiUse NO_CONTENT
 * @apiUse Authorization
 * @apiUse NotFound
 * @apiUse UNAUTHORIZED
 *
 */

/**
 * @apiDefine PermissionResource
 * @apiVersion 1.0.0
 *
 * @apiSuccess {String}   data.type Permission type
 * @apiSuccess {Integer}  data.id Permission id
 * @apiSuccess {Object}   data.attributes Permission attributes
 * @apiSuccess {String}   data.attributes.createdAt Permission attribute
 * @apiSuccess {String}   data.attributes.updatedAt Permission attribute
 *
 */

/**
 * @apiDefine PermissionResourceExample
 *
 * @apiSuccessExample Success-Response:
 *     HTTP/1.1 200 Ok
 *     {
 *         "data":
 *         {
 *              "type": "permission",
 *              "id": 3,
 *              "attributes": {
 *                  "createdAt": "2020-07-23 02:24:48",
 *                  "updatedAt": "2020-07-23 02:24:48"
 *              },
 *         }
 *     }
 */

/**
 * @apiDefine PermissionResourceCollectionExample
 *
 * @apiSuccessExample Success-Response:
 *     HTTP/1.1 200 Ok
 *     {
 *         "data": [
 *         {
 *              "type": "permission",
 *              "id": 3,
 *              "attributes": {
 *                  "createdAt": "2020-07-23 02:24:48",
 *                  "updatedAt": "2020-07-23 02:24:48"
 *              },
 *         }
 *     ]}
 *
 */
