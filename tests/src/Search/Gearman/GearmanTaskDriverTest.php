<?php

namespace tests\eLife\Search\Gearman {

    use Closure;
    use Doctrine\Common\Annotations\AnnotationReader;
    use eLife\Search\Annotation\GearmanTaskDriver;
    use eLife\Search\Annotation\GearmanTaskInstance;
    use eLife\Search\Annotation\Register;
    use GearmanWorker;
    use MockAnnotations;
    use PHPUnit_Framework_TestCase;
    use Psr\Log\LoggerInterface;
    use Psr\Log\NullLogger;

    class GearmanTaskDriverTest extends PHPUnit_Framework_TestCase
    {
        /**
         * @var GearmanTaskDriver
         */
        private $taskDriver;

        public function setUp()
        {
            Register::registerLoader();
            if (!class_exists('GearmanWorker')) {
                $this->markTestSkipped('Gearman must be installed to run these tests');
            }

            $this->taskDriver = new GearmanTaskDriver(new AnnotationReader(), new GearmanWorker(), new GearmanClientMock(), false);
        }

        /**
         * @test
         */
        public function test_can_instantiate()
        {
            $this->assertInstanceOf(GearmanTaskDriver::class, $this->taskDriver);
        }

        /**
         * @test
         */
        public function test_can_read_annotations()
        {
            $this->taskDriver->registerWorkflow(new MockAnnotations\MockClassWithNamedAnnotations());
            $this->assertContainsOnlyInstancesOf(GearmanTaskInstance::class, $this->taskDriver->tasks);
            $this->taskDriver->map(Closure::bind(function ($item) {
                $this->assertSame('testing_a', $item->name);
                $this->assertSame('testingAMethod', $item->method);
            }, $this));
        }

        /**
         * @test
         */
        public function test_can_read_annotations_with_flow()
        {
            $this->taskDriver->registerWorkflow(new MockAnnotations\MockClassWithNamedAndFlowAnnotations());
            $this->assertContainsOnlyInstancesOf(GearmanTaskInstance::class, $this->taskDriver->tasks);
            $this->taskDriver->map(Closure::bind(function ($item) {
                $this->assertSame('testing_b', $item->name);
                $this->assertSame('testingBMethod', $item->method);
                $this->assertSame('testing_c', $item->next);
            }, $this));
        }

        /**
         * @test
         */
        public function test_can_read_annotations_with_params()
        {
            $this->taskDriver->registerWorkflow(new MockAnnotations\MockClassWithNamedAndParametersAnnotations());
            $this->assertContainsOnlyInstancesOf(GearmanTaskInstance::class, $this->taskDriver->tasks);
            $this->taskDriver->map(Closure::bind(function ($item) {
                $this->assertSame('testing_c', $item->name);
                $this->assertSame('testingCMethod', $item->method);
                $this->assertSame(['testA', 'testB'], $item->parameters);
            }, $this));
        }

        /**
         * @test
         */
        public function test_can_add_tasks_without_annotations()
        {
            $this->taskDriver->registerWorkflow(new MockAnnotations\MockedClassWithoutAnnotations());
            $this->assertContainsOnlyInstancesOf(GearmanTaskInstance::class, $this->taskDriver->tasks);
            $this->taskDriver->map(Closure::bind(function ($item) {
                $this->assertSame('testing_d', $item->name);
                $this->assertSame('testingDMethod', $item->method);
            }, $this));
        }

        public function failLogger() {
            $fail = function($message) {
                $this->fail($message);
            };
            return new class ($fail) implements LoggerInterface {
                private $failFn;
                public function __construct($fail)
                {
                    $this->failFn = $fail;
                }

                public function fail($message) {
                    $fail = $this->failFn;
                    return $fail($message);
                }

                public function emergency($message, array $context = array())
                {
                    $this->fail($message);
                }

                public function alert($message, array $context = array())
                {
                    $this->fail($message);
                }

                public function critical($message, array $context = array())
                {
                    $this->fail($message);
                }

                public function error($message, array $context = array())
                {
                }

                public function warning($message, array $context = array())
                {
                }

                public function notice($message, array $context = array())
                {
                }

                public function info($message, array $context = array())
                {
                }

                public function debug($message, array $context = array())
                {
                }

                public function log($level, $message, array $context = array())
                {
                }
            };
        }

        /**
         * @test
         */
        public function test_adding_tasks_to_worker()
        {
            $instance = new GearmanTaskInstance(new MockAnnotations\MockedClassForRunning(), 'testingMethod', 'testing');

            $fn = $this->taskDriver->createJob($instance, new NullLogger());
            $this->assertInstanceOf(Closure::class, $fn);
        }
    }

}

namespace MockAnnotations {

    use eLife\Search\Annotation\GearmanTask;
    use eLife\Search\Workflow\Workflow;

    class MockedClassForRunning implements Workflow
    {
        /**
         * @GearmanTask(name="testing")
         */
        public function testingMethod() {
            return 'this is working';
        }

        public function deserialize($v) {
            return $v;
        }
    }

    class MockClassWithNamedAnnotations implements Workflow
    {
        /**
         * @GearmanTask(name="testing_a");
         */
        public function testingAMethod()
        {
        }
    }

    class MockClassWithNamedAndFlowAnnotations implements Workflow
    {
        /**
         * @GearmanTask(name="testing_b", next="testing_c");
         */
        public function testingBMethod()
        {
        }
    }

    class MockClassWithNamedAndParametersAnnotations implements Workflow
    {
        /**
         * @GearmanTask(name="testing_c", parameters={"testA", "testB"});
         */
        public function testingCMethod()
        {
        }
    }

    class MockedClassWithoutAnnotations implements Workflow
    {
        public function getTasks() {
            return [
                'testing_d' => 'testingDMethod'
            ];
        }

        public function testingDMethod()
        {
        }
    }

}
