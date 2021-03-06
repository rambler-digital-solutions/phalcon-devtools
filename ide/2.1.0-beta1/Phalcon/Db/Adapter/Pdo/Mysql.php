<?php 

namespace Phalcon\Db\Adapter\Pdo {

	/**
	 * Phalcon\Db\Adapter\Pdo\Mysql
	 *
	 * Specific functions for the Mysql database system
	 *
	 *<code>
	 *
	 * use Phalcon\Db\Adapter\Pdo\Mysql;
	 *
	 * $config = [
	 *   "host"     => "192.168.0.11",
	 *   "dbname"   => "blog",
	 *   "port"     => 3306,
	 *   "username" => "sigma",
	 *   "password" => "secret"
	 * ];
	 *
	 * $connection = new Mysql($config);
	 *</code>
	 */
	
	class Mysql extends \Phalcon\Db\Adapter\Pdo implements \Phalcon\Events\EventsAwareInterface, \Phalcon\Db\AdapterInterface {

		protected $_type;

		protected $_dialectType;

		/**
		 * Escapes a column/table/schema name
		 *
		 * <code>
		 * echo $connection->escapeIdentifier('my_table'); // `my_table`
		 * echo $connection->escapeIdentifier(['companies', 'name']); // `companies`.`name`
		 * <code>
		 *
		 * @param string|array identifier
		 */
		public function escapeIdentifier($identifier){ }


		/**
		 * Returns an array of \Phalcon\Db\Column objects describing a table
		 *
		 * <code>
		 * print_r($connection->describeColumns("posts"));
		 * </code>
		 */
		public function describeColumns($table, $schema=null){ }


		/**
		 * Lists table indexes
		 *
		 * <code>
		 *   print_r($connection->describeIndexes('robots_parts'));
		 * </code>
		 *
		 * @param  string table
		 * @param  string schema
		 * @return \Phalcon\Db\IndexInterface[]
		 */
		public function describeIndexes($table, $schema=null){ }


		/**
		 * Lists table references
		 *
		 *<code>
		 * print_r($connection->describeReferences('robots_parts'));
		 *</code>
		 */
		public function describeReferences($table, $schema=null){ }

	}
}
