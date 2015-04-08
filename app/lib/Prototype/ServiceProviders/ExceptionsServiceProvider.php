<?php namespace Prototype\ServiceProviders;

use Illuminate\Support\ServiceProvider;
use Laracasts\Validation\FormValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Prototype\ExceptionHandler\Factory;
use Prototype\ExceptionHandler\LogMessageFactory;

/**
* Class ExceptionProvider
*/
class ExceptionsServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->registerCommonException();
    }

    private function loggingHelper($method, $param = null)
    {
        // Make exception handler: ApiExceptionHandle or WebExceptionHandle
        $handler = Factory::createHanlder();

        //Make sure ApiExceptionHandler Methods exclude param
        if ($handler instanceof Prototype\ExceptionHandler\ApiExceptionHandler) $param = null;

        //Call handle method
        return $handler->{$method}($param);
    }
    /**
    * Register Common Exception
    */
    public function registerCommonException()
    {
        
        $this->app->error(function (\Exception $e, $code) {

            // Get exception name 
            $reflect = new \ReflectionClass($e);
            $shortName = $reflect->getShortName();

            // Log error
            $msg = LogMessageFactory::makeLog($shortName, $e);

            // Need attach $exception variable?
            $attachException = ["FormValidationException"];
            if (in_array($shortName, $attachException))
                return $this->loggingHelper('handle' . $shortName, $e);

            // No need exception variable
            return $this->loggingHelper('handle' . $shortName);

        });        
    }
}
