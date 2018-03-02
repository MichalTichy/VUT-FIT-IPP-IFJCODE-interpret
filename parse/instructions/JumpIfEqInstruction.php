<?php

require_once("instructions\IInstruction.php");
class JumpIfEqInstruction implements IInstruction
{
    protected $arg1;
    protected $arg2;
    protected $arg3;
    public function __construct($instructionTextRepresentation){
        $parser=new InstructionParser();
        $parser->CheckIfInstructionHaveAllParameters($instructionTextRepresentation,3);
        $this->arg1=$parser->ExtractArgument($instructionTextRepresentation,1);
        $this->arg2=$parser->ExtractArgument($instructionTextRepresentation,2);
        $this->arg3=$parser->ExtractArgument($instructionTextRepresentation,3);

        $labelValidator=new LabelValidator();
        $symbolValidator=new SymbolValidator();

        $labelValidator->Validate($this->arg1);
        $symbolValidator->Validate($this->arg2);
        $symbolValidator->Validate($this->arg3);

    }

    public function ToXmlElement(){

    }
}
