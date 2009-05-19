<?php
/**
 * Unit test
 *
 * This software is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License version 2.1 as published by the Free Software Foundation
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * @copyright  Copyright (c) 2008 Mayflower GmbH (http://www.mayflower.de)
 * @license    LGPL 2.1 (See LICENSE file)
 * @version    $Id$
 * @link       http://www.phprojekt.com
 * @since      File available since Release 6.0
 */
require_once 'PHPUnit/Framework.php';

/**
 * Tests Note Model class
 *
 * @copyright  Copyright (c) 2008 Mayflower GmbH (http://www.mayflower.de)
 * @license    LGPL 2.1 (See LICENSE file)
 * @version    Release: @package_version@
 * @link       http://www.phprojekt.com
 * @since      File available since Release 6.0
 * @author     Mariano La Penna <mariano.lapenna@mayflower.de>
 */
class Note_Models_Note_Test extends PHPUnit_Framework_TestCase
{
    private $_model = null;

    /**
     * setUp method for PHPUnit
     */
    public function setUp()
    {
        $this->_model = new Note_Models_Note();
    }

    /**
     * Test creating a item -in fact via via default model
     */
    public function testCreatingItem()
    {
        $model = clone($this->_model);
        $model->title     = 'Title 3';
        $model->comments  = 'Comments 3';
        $model->projectId = 1;
        $model->category  = 'category 3';
        $model->save();

        $this->assertEquals("Title 3", $model->title);
        $this->assertEquals("Comments 3", $model->comments);
        $this->assertEquals(1, $model->projectId);
        $this->assertEquals("category 3", $model->category);
    }

    /**
     * Test editing a item -in fact via default model
     */
    public function testEditingItem()
    {
        $model = clone($this->_model);
        $model->find(3);
        $model->title     = 'Title 3 modified';
        $model->comments  = 'Comments 3 modified';
        $model->projectId = 1;
        $model->category  = 'category 3 modified';
        $model->save();

        $this->assertEquals("Title 3 modified", $model->title);
        $this->assertEquals("Comments 3 modified", $model->comments);
        $this->assertEquals("category 3 modified", $model->category);
    }

    /**
     * Test deletion of item -in fact via default model
     */
    public function testDeletingItem()
    {
        $rowsBefore = count($this->_model->fetchAll());
        $model = clone($this->_model);
        $model->find(2);
        $model->delete();
        $rowsAfter = count($this->_model->fetchAll());
        $this->assertEquals($rowsBefore - 1, $rowsAfter);
    }
}