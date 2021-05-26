<?php

// @codingStandardsIgnoreStart

/**
 * @api {get} /api/messages List
 * @apiVersion 1.0.0
 * @apiName api.messages.index
 * @apiGroup Message
 *
 * @apiParam {String} [filter[query]] query string by
 * @apiParam {Integer} [page[number]] page
 * @apiParam {Integer} [page[size]] items on page
 * @apiParam {String="createdAt"} [sort] example: -createdAt desc, createdAt asc
 *
 * @apiSuccess {object[]} data Data
 * @apiUse MessageResource
 *
 * @apiUse MessageResourceCollectionExample
 * @apiUse Authorization
 * @apiUse UNAUTHORIZED
 *
 */

/**
 * @api {get} /api/messages/:id Get
 * @apiVersion 1.0.0
 * @apiName api.messages.show
 * @apiGroup Message
 *
 * @apiSuccess {object} data Data
 * @apiUse MessageResource
 *
 * @apiUse MessageResourceExample
 *
 * @apiUse Authorization
 * @apiUse UNAUTHORIZED
 * @apiUse NotFound
 */

/**
 * @api {post} /api/messages Store
 * @apiVersion 1.0.0
 * @apiName api.messages.store
 * @apiGroup Message
 *
 * @apiParam {Integer} title
 *
 * @apiSuccess {object} data Data
 * @apiUse MessageResource
 *
 * @apiUse MessageResourceExample
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
 * @api {put} /api/messages/:id Update
 * @apiVersion 1.0.0
 * @apiName api.messages.update
 * @apiGroup Message
 *
 * @apiParam {String} title
 * @apiParam {Integer} number
 *
 * @apiSuccess {object} data Data
 * @apiUse MessageResource
 *
 * @apiUse MessageResourceExample
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
 * @api {delete} /api/messages/:id Delete
 * @apiVersion 1.0.0
 * @apiName api.messages.destroy
 * @apiGroup Message
 *
 * @apiUse NO_CONTENT
 * @apiUse Authorization
 * @apiUse NotFound
 * @apiUse UNAUTHORIZED
 *
 */

/**
 * @apiDefine MessageResource
 * @apiVersion 1.0.0
 *
 * @apiSuccess {String}   data.type Message type
 * @apiSuccess {Integer}  data.id Message id
 * @apiSuccess {Object}   data.attributes Message attributes
 * @apiSuccess {String}   data.attributes.createdAt Message attribute
 * @apiSuccess {String}   data.attributes.updatedAt Message attribute
 *
 */

/**
 * @apiDefine MessageResourceExample
 *
 * @apiSuccessExample Success-Response:
 *     HTTP/1.1 200 Ok
 *     {
 *         "data":
 *         {
 *              "type": "message",
 *              "id": 3,
 *              "attributes": {
 *                  "createdAt": "2020-07-23 02:24:48",
 *                  "updatedAt": "2020-07-23 02:24:48"
 *              },
 *         }
 *     }
 */

/**
 * @apiDefine MessageResourceCollectionExample
 *
 * @apiSuccessExample Success-Response:
 *     HTTP/1.1 200 Ok
 *     {
 *         "data": [
 *         {
 *              "type": "message",
 *              "id": 3,
 *              "attributes": {
 *                  "createdAt": "2020-07-23 02:24:48",
 *                  "updatedAt": "2020-07-23 02:24:48"
 *              },
 *         }
 *     ]}
 *
 */
