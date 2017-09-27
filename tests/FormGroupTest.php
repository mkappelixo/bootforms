<?php

use Galahad\BootForms\Elements\FormGroup;
use Galahad\BootForms\Elements\HelpBlock;
use Galahad\Forms\FormBuilder;

class FormGroupTest extends PHPUnit\Framework\TestCase
{
    public function setUp()
    {
        $this->builder = new FormBuilder;
    }

    public function testCanRenderBasicFormGroup()
    {
        $label = $this->builder->label('Email');
        $text = $this->builder->text('email');
        $formGroup = new FormGroup($label, $text);

        $expected = '<div class="form-group"><label>Email</label><input type="text" name="email"></div>';
        $result = $formGroup->render();
        $this->assertEquals($expected, $result);
    }

    public function testCanRenderWithPlaceholder()
    {
        $label = $this->builder->label('Email');
        $text = $this->builder->text('email');
        $formGroup = new FormGroup($label, $text);
        $formGroup->placeholder('email address');

        $expected = '<div class="form-group"><label>Email</label><input type="text" name="email" placeholder="email address"></div>';
        $result = $formGroup->render();
        $this->assertEquals($expected, $result);
    }

    public function testCanRenderWithValue()
    {
        $label = $this->builder->label('Email');
        $text = $this->builder->text('email');
        $formGroup = new FormGroup($label, $text);
        $formGroup->value('example@example.com');

        $expected = '<div class="form-group"><label>Email</label><input type="text" name="email" value="example@example.com"></div>';
        $result = $formGroup->render();
        $this->assertEquals($expected, $result);
    }

    public function testCanRenderWithDefaultValue()
    {
        $label = $this->builder->label('Email');
        $text = $this->builder->text('email');
        $formGroup = new FormGroup($label, $text);
        $formGroup->defaultValue('example@example.com');

        $expected = '<div class="form-group"><label>Email</label><input type="text" name="email" value="example@example.com"></div>';
        $result = $formGroup->render();
        $this->assertEquals($expected, $result);
    }

    public function testDefaultValueNotAppliedIfAlreadyAValue()
    {
        $label = $this->builder->label('Email');
        $text = $this->builder->text('email');
        $formGroup = new FormGroup($label, $text);
        $formGroup->value('test@test.com')->defaultValue('example@example.com');

        $expected = '<div class="form-group"><label>Email</label><input type="text" name="email" value="test@test.com"></div>';
        $result = $formGroup->render();
        $this->assertEquals($expected, $result);
    }

    public function testCanRenderWithHelpBlock()
    {
        $label = $this->builder->label('Email');
        $text = $this->builder->text('email');
        $formGroup = new FormGroup($label, $text);
        $formGroup->helpBlock('Email is required.');

        $expected = '<div class="form-group"><label>Email</label><input type="text" name="email"><p class="help-block">Email is required.</p></div>';
        $result = $formGroup->render();
        $this->assertEquals($expected, $result);
    }

    public function testCanIncludeHtmlInLabels()
    {
        $label = $this->builder->label('<span>Email</span>');
        $text = $this->builder->text('email');
        $formGroup = new FormGroup($label, $text);

        $expected = '<div class="form-group"><label><span>Email</span></label><input type="text" name="email"></div>';
        $result = $formGroup->render();
        $this->assertEquals($expected, $result);
    }
}
