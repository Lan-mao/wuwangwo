<?php
namespace randian;
/**
 * Class Config
 *
 * 执行Sample示例所需要的配置，用户在这里配置好Endpoint，AccessId， AccessKey和Sample示例操作的
 * bucket后，便可以直接运行RunAll.php, 运行所有的samples
 */
final class Config
{
    const OSS_ACCESS_ID = 'LTAI0BWOl6wt82V7';
    const OSS_ACCESS_KEY = 'IyNXqWOvEBPZOTtz1EP3GhhKUkQiyF';
    const OSS_ENDPOINT = 'oss-cn-shanghai.aliyuncs.com';
    const OSS_BUCKET = 'rd-aihao';
    const OSS_AVATAR_DIR = 'website/upload/avatar/';
}
