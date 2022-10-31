<?php
  
namespace App\Traits;

use Illuminate\Http\Response;

trait ApiRespons 
{
    /**
     * Set api version
     *
     * @var string
     */
    protected static $version = "v1";

    /**
     * Set type sent data
     *
     * @var string
     */
    protected static $type = "API";

    /**
     * Set content type
     *
     * @var string
     */
    protected static $contentType = "application/json";

    /**
     * Set response body
     *
     * @var object
     */
    protected static $formatter = [
        'status' => Response::HTTP_OK,
        'message' => null,
        'link' => null,
        'meta' => [
            'version' => null,
            'author' => null,
            'host' => null,
            'type' => null,
            'date' => null,
            'accept' => null,
            'content-type' => null
        ],
        'data' => [],
        'metadata' => [
            'total_data' => 0
        ]
    ];

    /**
     * Create response body
     *
     * @param string $message
     * @param string $link
     * @param array $data
     * @param int $code
     * @return array
     */
    protected function createResponse(string $message = null, string $link = null, array $data, int $code = 200)
    {
        try {
            static::$formatter['status'] = $code;
            static::$formatter['message'] = $this->replaceNullValueWithEmptyString($message);
            static::$formatter['link'] = $this->replaceNullValueWithEmptyString($link);

            static::$formatter['metadata']['total_data'] = isset($data['total_data']) ? $data['total_data'] : (isset($data['data']) ? (is_countable($data['data']) ? count($data['data']) : (($data['data'] == "") ? 0 : 1)) : 0);
            
            static::$formatter['meta']['version'] = static::$version;
            static::$formatter['meta']['author'] = $this->replaceNullValueWithEmptyString(config('app.author'));
            static::$formatter['meta']['host'] = $this->replaceNullValueWithEmptyString(config('app.url'));
            static::$formatter['meta']['type'] = static::$type;
            static::$formatter['meta']['date'] = date('d-m-Y H:i:s');

            static::$formatter['meta']['accept'] = static::$contentType;
            static::$formatter['meta']['content-type'] = static::$contentType;
            
            static::$formatter['data'] = isset($data['data']) ? $data['data'] : [];

            if (isset($data['error'])) {
                static::$formatter['errors'] = $this->replaceNullValueWithEmptyString($data['error']);
            }

            if (isset($data['token'])) {
                static::$formatter['token'] = $this->replaceNullValueWithEmptyString($data['token']);
                static::$formatter['token_type'] = isset($data['token_type']) ? $data['token_type'] : 'Bearer';
                static::$formatter['expires_in'] = isset($data['expires_in']) ? $data['expires_in'] : '3600';
            }

            return response()->json(static::$formatter, $code);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 500,
                'error' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Replace empty string if variable have null value
     *
     * @param mixed $value
     * @return string
     */
    public function replaceNullValueWithEmptyString($value)
    {
        return $value = $value === null ? "" : $value;
    }
}