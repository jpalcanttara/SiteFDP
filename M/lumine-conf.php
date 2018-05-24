<?php
#### START AUTOCODE
################################################################################
#  Lumine - Database Mapping for PHP
#  Copyright (C) 2005  Hugo Ferreira da Silva
#  
#  This program is free software: you can redistribute it and/or modify
#  it under the terms of the GNU General Public License as published by
#  the Free Software Foundation, either version 3 of the License, or
#  (at your option) any later version.
#  
#  This program is distributed in the hope that it will be useful,
#  but WITHOUT ANY WARRANTY; without even the implied warranty of
#  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
#  GNU General Public License for more details.
#  
#  You should have received a copy of the GNU General Public License
#  along with this program.  If not, see <http://www.gnu.org/licenses/>
################################################################################
/**
 * Created by Lumine_Reverse
 * in 2014-03-20
 * @author Hugo Ferreira da Silva
 * @link http://www.hufersil.com.br/lumine
 *
 * Arquivo de configuração para "sr_php_cmrv"
 */

$lumineConfig = array(
    'dialect' => 'MySQLi', 
    'database' => 'BD_SiteFDP', 
    'user' => 'root', 
    'password' => '11202270', 
    'port' => '3306', 
    'host' => 'localhost', 
    'class_path' => '', 
    'package' => 'class', 
    'addons_path' => '', 
    'acao' => 'gerar', 

	
    'options' => array(
        'configID' => '', 
        'tipo_geracao' => '1', 
        'classMapping' => 'default', 
        'cache' => 'APC', 
        'remove_prefix' => '', 
        'remove_count_chars_start' => '0', 
        'remove_count_chars_end' => '0', 
        'format_classname' => '%s', 
        'schema_name' => '', 
        'many_to_many_style' => '%s_%s', 
        'plural' => '', 
        'create_controls' => '', 
        'class_sufix' => '', 
        'generateAccessors' => '1', 
        'create_entities_for_many_to_many' => '1', 
        'keep_foreign_column_name' => '1', 
        'camel_case' => '1', 
        'usar_dicionario' => '1', 
        'create_paths' => '1', 
        'create_dtos' => '1', 
        'auto_cast_dto' => '1', 
        'dto_format' => '%sDTO', 
        'create_models' => '1', 
        'model_path' => 'Model', 
        'model_format' => '%sModel', 
        'model_context' => '1', 
        'model_context_path' => '', 
        'classDescriptor' => '', 
        'overwrite' => '0', 
        'generate_files' => '1', 
        'generate_zip' => '0'
    )
);



?>