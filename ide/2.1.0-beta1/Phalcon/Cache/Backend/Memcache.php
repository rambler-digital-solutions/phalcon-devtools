<?php 

namespace Phalcon\Cache\Backend {

	/**
	 * Phalcon\Cache\Backend\Memcache
	 *
	 * Allows to cache output fragments, PHP data or raw data to a memcache backend
	 *
	 * This adapter uses the special memcached key "_PHCM" to store all the keys internally used by the adapter
	 *
	 *<code>
	 *
	 * // Cache data for 2 days
	 * $frontCache = new \Phalcon\Cache\Frontend\Data(array(
	 *    "lifetime" => 172800
	 * ));
	 *
	 * //Create the Cache setting memcached connection options
	 * $cache = new \Phalcon\Cache\Backend\Memcache($frontCache, array(
	 *		'host' => 'localhost',
	 *		'port' => 11211,
	 *  	'persistent' => false
	 * ));
	 *
	 * //Cache arbitrary data
	 * $cache->save('my-data', array(1, 2, 3, 4, 5));
	 *
	 * //Get data
	 * $data = $cache->get('my-data');
	 *
	 *</code>
	 */
	
	class Memcache extends \Phalcon\Cache\Backend implements \Phalcon\Cache\BackendInterface {

		protected $_memcache;

		/**
		 * \Phalcon\Cache\Backend\Memcache constructor
		 *
		 * @param	Phalcon\Cache\FrontendInterface frontend
		 * @param	array options
		 */
		public function __construct(\Phalcon\Cache\FrontendInterface $frontend, $options=null){ }


		/**
		 * Create internal connection to memcached
		 */
		public function _connect(){ }


		/**
		 * Add servers to memcache pool	 	
		 */
		public function addServers($host, $port, $persistent=null){ }


		/**
		 * Returns a cached content
		 *
		 * @param int|string keyName
		 * @param   long lifetime
		 * @return  mixed
		 */
		public function get($keyName, $lifetime=null){ }


		/**
		 * Stores cached content into the file backend and stops the frontend
		 *
		 * @param int|string keyName
		 * @param string content
		 * @param long lifetime
		 * @param boolean stopBuffer
		 */
		public function save($keyName=null, $content=null, $lifetime=null, $stopBuffer=null){ }


		/**
		 * Deletes a value from the cache by its key
		 *
		 * @param int|string keyName
		 * @return boolean
		 */
		public function delete($keyName){ }


		/**
		 * Query the existing cached keys
		 *
		 * @param string prefix
		 * @return array
		 */
		public function queryKeys($prefix=null){ }


		/**
		 * Checks if cache exists and it isn't expired
		 *
		 * @param string keyName
		 * @param   long lifetime
		 * @return boolean
		 */
		public function exists($keyName=null, $lifetime=null){ }


		/**
		 * Increment of given $keyName by $value
		 *
		 * @param  string keyName
		 * @param  long value
		 * @return long
		 */
		public function increment($keyName=null, $value=null){ }


		/**
		 * Decrement of $keyName by given $value
		 *
		 * @param  string keyName
		 * @param  long value
		 * @return long
		 */
		public function decrement($keyName=null, $value=null){ }


		/**
		 * Immediately invalidates all existing items.
		 */
		public function flush(){ }

	}
}
