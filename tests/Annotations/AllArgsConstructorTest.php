<?php

class AllArgsConstructorTest extends \PHPUnit_Framework_TestCase
{
    /** @var \Ytake\Lom\Lom */
    protected $lom;
    /** @var \Ytake\Lom\Printer  */
    protected $printer;
    protected function setUp()
    {
        $this->lom = new \Ytake\Lom\Lom(
            new \Ytake\Lom\CodeParser(
                new \PhpParser\Parser(new \PhpParser\Lexer)
            )
        );
        $this->printer = new \Ytake\Lom\Printer(
            new \PhpParser\PrettyPrinter\Standard()
        );
    }

    public function testGenerateCode()
    {
        $code = $this->lom->register(new \Ytake\Lom\AnnotationRegister())
            ->target('AllArgsConstructorAnnotation')
            ->parseCode();
        $code = $this->printer->setStatement($code)
            ->display();
        $constructor = "public function __construct(\$message)
    {
        \$this->message = \$message;
    }";
        $this->assertContains($constructor, $code);
    }

    public function testExistsConstructorGenerateCode()
    {
        $code = $this->lom->register(new \Ytake\Lom\AnnotationRegister())
            ->target('AllArgsConstructorExistsAnnotation')
            ->parseCode();
        $code = $this->printer->setStatement($code)
            ->display();
        $this->assertContains('public function __construct($message)', $code);

    }
}
