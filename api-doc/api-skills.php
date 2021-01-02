<?php

// @codingStandardsIgnoreStart

/**
 * @api {get} /api/skills List
 * @apiVersion 1.0.0
 * @apiName api.skills.index
 * @apiGroup Skill
 *
 * @apiParam {String} [filter[query]] query string by
 * @apiParam {Integer} [page[number]] page
 * @apiParam {Integer} [page[size]] items on page
 * @apiParam {String="createdAt"} [sort] example: -createdAt desc, createdAt asc
 *
 * @apiSuccess {object[]} data Data
 * @apiUse SkillResource
 *
 * @apiUse SkillResourceCollectionExample
 * @apiUse Authorization
 * @apiUse UNAUTHORIZED
 *
 */

/**
 * @api {get} /api/skills/:id Get
 * @apiVersion 1.0.0
 * @apiName api.skills.show
 * @apiGroup Skill
 *
 * @apiSuccess {object} data Data
 * @apiUse SkillResource
 *
 * @apiUse SkillResourceExample
 *
 * @apiUse Authorization
 * @apiUse UNAUTHORIZED
 * @apiUse NotFound
 */

/**
 * @api {post} /api/skills Store
 * @apiVersion 1.0.0
 * @apiName api.skills.store
 * @apiGroup Skill
 *
 * @apiParam {Integer} title
 *
 * @apiSuccess {object} data Data
 * @apiUse SkillResource
 *
 * @apiUse SkillResourceExample
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
 * @api {put} /api/skills/:id Update
 * @apiVersion 1.0.0
 * @apiName api.skills.update
 * @apiGroup Skill
 *
 * @apiParam {String} title
 * @apiParam {Integer} number
 *
 * @apiSuccess {object} data Data
 * @apiUse SkillResource
 *
 * @apiUse SkillResourceExample
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
 * @api {delete} /api/skills/:id Delete
 * @apiVersion 1.0.0
 * @apiName api.skills.destroy
 * @apiGroup Skill
 *
 * @apiUse NO_CONTENT
 * @apiUse Authorization
 * @apiUse NotFound
 * @apiUse UNAUTHORIZED
 *
 */

/**
 * @apiDefine SkillResource
 * @apiVersion 1.0.0
 *
 * @apiSuccess {String}   data.type Skill type
 * @apiSuccess {Integer}  data.id Skill id
 * @apiSuccess {Object}   data.attributes Skill attributes
 * @apiSuccess {String}   data.attributes.createdAt Skill attribute
 * @apiSuccess {String}   data.attributes.updatedAt Skill attribute
 *
 */

/**
 * @apiDefine SkillResourceExample
 *
 * @apiSuccessExample Success-Response:
 *     HTTP/1.1 200 Ok
 *     {
 *         "data":
 *         {
 *              "type": "skill",
 *              "id": 3,
 *              "attributes": {
 *                  "createdAt": "2020-07-23 02:24:48",
 *                  "updatedAt": "2020-07-23 02:24:48"
 *              },
 *         }
 *     }
 */

/**
 * @apiDefine SkillResourceCollectionExample
 *
 * @apiSuccessExample Success-Response:
 *     HTTP/1.1 200 Ok
 *     {
 *         "data": [
 *         {
 *              "type": "skill",
 *              "id": 3,
 *              "attributes": {
 *                  "createdAt": "2020-07-23 02:24:48",
 *                  "updatedAt": "2020-07-23 02:24:48"
 *              },
 *         }
 *     ]}
 *
 */
