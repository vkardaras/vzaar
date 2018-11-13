<?php
    namespace VzaarApi;

    use VzaarApi\Resources\Record;
    use VzaarApi\Exceptions\ArgumentTypeEx;
    use VzaarApi\Client;

class LinkUpload extends Video
{

    protected static $endpoint;


    public function __construct($client = null, $s3client = null)
    {

        self::$endpoint = '/link_uploads';

        parent::__construct($client, $s3client);

    }//end __construct()


    protected function linkCreate($params)
    {

        ArgumentTypeEx::assertIsArray($params);

        if (array_key_exists('uploader', array_change_key_case($params, CASE_LOWER)) === false) {
            $params['uploader'] = Client::UPLOADER.Client::VERSION;
        }

        $this->crudCreate($params);

    }//end linkCreate()


    public static function create($params, $client = null, $s3client = null)
    {

        $link = new self($client, $s3client);
        $link->linkCreate($params);

        return $link;

    }//end create()


}//end class
