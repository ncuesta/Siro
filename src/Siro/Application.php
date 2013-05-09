<?php

namespace Siro;

use \Silex\Provider;
use \Dflydev\Silex\Provider\Psr0ResourceLocator\Psr0ResourceLocatorServiceProvider;
use \Dflydev\Silex\Provider\Psr0ResourceLocator\Composer\ComposerResourceLocatorServiceProvider;
use \Dflydev\Silex\Provider\DoctrineOrm\DoctrineOrmServiceProvider;
use \SilexGravatar;
use \Gravatar;
use \Monolog\Logger;

/**
 * Siro main Application class.
 *
 * @author José Nahuel Cuesta Luengo <nahuelcuestaluengo@gmail.com>
 */
class Application extends \Silex\Application
{
    public function __construct(array $values = array())
    {
        parent::__construct($values);

        $this->defineRoutes();
    }

//            ->register(new Psr0ResourceLocatorServiceProvider())
//            ->register(new ComposerResourceLocatorServiceProvider())
//            ->register(new DoctrineOrmServiceProvider(), array(
//                'orm.proxies_dir'       => $this['path.cache'] . '/proxy',
//                'orm.proxies_namespace' => 'Siro\Proxy',
//                'orm.em.options'        => array(
//                    'mappings' => array(
//                        array(
//                            'type'                => 'annotation',
//                            'namespace'           => 'Siro\Entity',
//                            'resources_namespace' => 'Siro\Entity',
//                        ),
//                    ),
//                ),
//            ))
//            ->register(new Provider\MonologServiceProvider(), array(
//                'monolog.logfile' => $this['path.log'] . '/' . $this['env'] . '.log',
//                'monolog.name'    => 'Siro',
//                'monolog.level'   => $this['debug'] ? Logger::DEBUG : Logger::INFO,
//            ))
//            ->register(new SilexGravatar\GravatarExtension(), array(
//                'gravatar.cache_dir'  => $this['path.cache'] . '/gravatar',
//                'gravatar.class_path' => $this['path.root'] . '/vendor/fate/gravatar-php/src',
//                'gravatar.options'    => array(
//                    'rating'  => Gravatar\Service::RATING_G,
//                    'default' => Gravatar\Service::DEFAULT_RETRO,
//                ),
//            ))

//        if ($this['debug']) {
//            // Enable the Web Profiler only for the Debug environment
//            $this->register(new Provider\WebProfilerServiceProvider(), array(
//                'profiler.cache_dir'    => $this['path.cache'] . '/profiler',
//                'profiler.mount_prefix' => '/_profiler',
//            ));
//        }

    /**
     * Define the routes to be used in this application.
     */
    protected function defineRoutes()
    {
        $this->definePublicRoutes();
        $this->defineSecureRoutes();
        $this->defineExampleRoutes();
    }

    /**
     * Define any public routes in this application.
     */
    protected function definePublicRoutes()
    {
        $this->get('/', 'Siro\Controller\Landing::index')
            ->bind('landing');
    }

    /**
     * Define any secure routes in this application.
     */
    protected function defineSecureRoutes()
    {
        $secure = $this['controllers_factory'];

        // TODO: Define secure routes here

        // TODO: Add the before middleware:
        // $secure->before($mustBeLoggedIn);

        $this->mount('/', $secure);
    }

    // TO BE REMOVED
    private function defineExampleRoutes()
    {
        $factory = $this['controllers_factory'];

        Controller\Example::mountOn($factory, $this);

        $this->mount('/example', $factory);
    }
}