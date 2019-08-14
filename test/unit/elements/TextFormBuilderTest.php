<?php
require_once 'lib/FormBuilder/elements/TextFormBuilder.php';
require_once 'lib/FormBuilder/templates/TextDefaultTemplate.php';

require_once 'PHPUnit/Framework/TestCase.php';

/**
 * TextFormBuilder test case.
 */
class TextFormBuilderTest extends PHPUnit_Framework_TestCase
{

    /**
     *
     * @var TextFormBuilder
     */
    private $TextFormBuilder;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        
        // TODO Auto-generated TextFormBuilderTest::setUp()
        
        $this->TextFormBuilder = new TextFormBuilder(/* parameters */);
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        // TODO Auto-generated TextFormBuilderTest::tearDown()
        $this->TextFormBuilder = null;
        
        parent::tearDown();
    }

    /**
     * Constructs the test case.
     */
    public function __construct()
    {
        // TODO Auto-generated constructor
    }
    
    public function testRender() {
        $attr = array(
            'label'=>'Name',
            'id'=>'name-id',
            'name'=>'name',
            'value'=>'Big Bob',
            'required'=>true,
            'autofocus'=>'name',
            'class'=>'name',
            'error'=>'There is an error here',
        );
        
        $expected = '<label for="name-id">Name</label>
<input type="text" id="name-id" name="name" value="Big Bob" required="required" autofocus class="name error">';
        
        $actual = $this->TextFormBuilder->render();
        $this->assertEquals($expected, $actual);
    }
}

