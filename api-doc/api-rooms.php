<?php

// @codingStandardsIgnoreStart

/**
 * @api {get} /api/rooms List
 * @apiVersion 1.0.0
 * @apiName api.rooms.index
 * @apiGroup Room
 *
 * @apiParam {String} [filter[query]] query string by
 * @apiParam {Integer} [page[number]] page
 * @apiParam {Integer} [page[size]] items on page
 * @apiParam {String="createdAt"} [sort] example: -createdAt desc, createdAt asc
 *
 * @apiSuccess {object[]} data Data
 * @apiUse RoomResource
 *
 * @apiUse RoomResourceCollectionExample
 * @apiUse Authorization
 * @apiUse UNAUTHORIZED
 *
 */

/**
 * @api {get} /api/rooms/:id Get
 * @apiVersion 1.0.0
 * @apiName api.rooms.show
 * @apiGroup Room
 *
 * @apiSuccess {object} data Data
 * @apiUse RoomResource
 *
 * @apiUse RoomResourceExample
 *
 * @apiUse Authorization
 * @apiUse UNAUTHORIZED
 * @apiUse NotFound
 */

/**
 * @api {post} /api/rooms Store
 * @apiVersion 1.0.0
 * @apiName api.rooms.store
 * @apiGroup Room
 *
 * @apiParam {Integer} title
 *
 * @apiSuccess {object} data Data
 * @apiUse RoomResource
 *
 * @apiUse RoomResourceExample
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
 * @api {put} /api/rooms/:id Update
 * @apiVersion 1.0.0
 * @apiName api.rooms.update
 * @apiGroup Room
 *
 * @apiParam {String} title
 * @apiParam {Integer} number
 *
 * @apiSuccess {object} data Data
 * @apiUse RoomResource
 *
 * @apiUse RoomResourceExample
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
 * @api {delete} /api/rooms/:id Delete
 * @apiVersion 1.0.0
 * @apiName api.rooms.destroy
 * @apiGroup Room
 *
 * @apiUse NO_CONTENT
 * @apiUse Authorization
 * @apiUse NotFound
 * @apiUse UNAUTHORIZED
 *
 */

/**
 * @apiDefine RoomResource
 * @apiVersion 1.0.0
 *
 * @apiSuccess {String}   data.type Room type
 * @apiSuccess {Integer}  data.id Room id
 * @apiSuccess {Object}   data.attributes Room attributes
 * @apiSuccess {String}   data.attributes.createdAt Room attribute
 * @apiSuccess {String}   data.attributes.updatedAt Room attribute
 *
 */

/**
 * @apiDefine RoomResourceExample
 *
 * @apiSuccessExample Success-Response:
 *     HTTP/1.1 200 Ok
 *     {
 *         "data":
 *         {
 *              "type": "room",
 *              "id": 3,
 *              "attributes": {
 *                  "createdAt": "2020-07-23 02:24:48",
 *                  "updatedAt": "2020-07-23 02:24:48"
 *              },
 *         }
 *     }
 */

/**
 * @apiDefine RoomResourceCollectionExample
 *
 * @apiSuccessExample Success-Response:
 *     HTTP/1.1 200 Ok
 *     {
 *         "data": [
 *         {
 *              "type": "room",
 *              "id": 3,
 *              "attributes": {
 *                  "createdAt": "2020-07-23 02:24:48",
 *                  "updatedAt": "2020-07-23 02:24:48"
 *              },
 *         }
 *     ]}
 *
 */
