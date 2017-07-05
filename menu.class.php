<?php 
/**
 *  @author: QHXH
 *  @Description: class create menu from array of data
 *  usage: $menu = QH_Menu( $data, $args );
 *  $data array [array with keys] : id, title, link, parent
 *  $args array [array with keys]:
 *  + wrap_tag: tag wrap for menu
 *  + wrap_tag_class: class for above wrap tag
 *  + wrap_tag_id: id for above wrap tag
 *  + wrap_ul_class: class of parent ul of menu
 *  + wrap_ul_id: id of parent ul of menu
 *  + top_parent_li_class: class of top li parent menu
 *  + parent_li_has_sub_class: class of li has sub
 *  + sub_ul_class: class of sub ul menu
 *  + top_parent_link_class: class of top parent tag a
 *  + top_parent_link_attr: attribute of top parent tag a
 *  + link_has_sub_class: class of link has sub
 *  + link_has_sub_attr: attribute of link has sub
 *  + link_class: class of common link
 *  + link_attr: attribute of common link
 */
class QH_Menu {
	/**
	 * Mang chua menu lay ra tu csdl
	 * mang thoa man cac truong: id, title, link, parent
	 * @var array
	 */
	protected $data;

	/**
	 * the bao ngoai menu 
	 * @var string
	 */
	protected $wrap_tag = 'div';

	/**
	 * class cua the bao ngoai menu
	 * @var string
	 */
	protected $wrap_tag_class = '';

	/**
	 * id cua the bao ngoai id
	 * @var string
	 */
	protected $wrap_tag_id = '';

	/**
	 * class cua menu ul
	 * @var string
	 */
	protected $wrap_ul_class = '';

	/**
	 * id cua menu ul
	 * @var string
	 */
	protected $wrap_ul_id = '';

	/**
	 * class cua top parent
	 * @var string
	 */
	protected $top_parent_li_class = '';

	/**
	 * class cua the li co sub menu
	 * @var string
	 */
	protected $parent_li_has_sub_class = '';

	/**
	 * class cua sub ul
	 * @var string
	 */
	protected $sub_ul_class = '';

	/***********************for link **********************/
	/**
	 * [$top_link_class class  cua top level link]
	 * @var string
	 */
	protected $top_parent_link_class = '';
	/**
	 * [$top_link_attr attribute cua top level link]
	 * @var array
	 */
	protected $top_parent_link_attr = array();
	/**
	 *  class for link which has sub menu
	 */
	protected $link_has_sub_class = '';
	/**
	 * [$link_has_sub_attr attribute of link which has sub menu]
	 * @var array
	 */
	protected $link_has_sub_attr = array();
	/**
	 * [$link_class class for all a tag]
	 * @var string
	 */
	protected $link_class = '';

	/**
	 * [$link_attr atribute for a tag]
	 * @var array
	 */
	protected $link_attr = array();


	/**
	 * @param array $data [Mang du lieu chua menu co cac key: id, title, link, parent]
	 * @param array args [cac tham so tuy cho thiet lap cho menu ung voi cac thuoc tinh]
	 */
	public function __construct($data = array(), $args = array()) 
	{
		$this->data = $data;

		if ( array_key_exists('wrap_tag', $args) )
			$this->wrap_tag = $args['wrap_tag'];

		if ( array_key_exists('wrap_tag_class', $args) )
			$this->wrap_tag_class = $args['wrap_tag_class'];

		if ( array_key_exists('wrap_tag_id', $args) )
			$this->wrap_tag_id = $args['wrap_tag_id'];

		if ( array_key_exists('wrap_ul_class', $args) )
			$this->wrap_ul_class = $args['wrap_ul_class'];

		if ( array_key_exists('wrap_ul_id', $args) )
			$this->wrap_ul_id = $args['wrap_ul_id'];

		if ( array_key_exists('top_parent_li_class', $args) )
			$this->top_parent_li_class = $args['top_parent_li_class'];

		if ( array_key_exists('parent_li_has_sub_class', $args) )
			$this->parent_li_has_sub_class = $args['parent_li_has_sub_class'];

		if ( array_key_exists('sub_ul_class', $args) )
			$this->sub_ul_class = $args['sub_ul_class'];

		if ( array_key_exists('link_class', $args) ) 
			$this->link_class = $args['link_class'];

		if ( array_key_exists('link_attr', $args) )
			$this->link_attr = $args['link_attr'];

		if ( array_key_exists('top_parent_link_class', $args) )
			$this->top_parent_link_class = $args['top_parent_link_class'];

		if ( array_key_exists('top_parent_link_attr', $args) )
			$this->top_parent_link_attr = $args['top_parent_link_attr'];

		if ( array_key_exists('link_has_sub_class', $args) )
			$this->link_has_sub_class = $args['link_has_sub_class'];

		if ( array_key_exists('link_has_sub_attr', $args) )
			$this->link_has_sub_attr = $args['link_has_sub_attr'];


	}




	/**
	 * @return Sua lai mang data voi khoa $menu[$parent_id][] = node
	 */
	private function prepare_data() {
		$temp_data = array();

		foreach ($this->data as $item) {
			$key = $item['parent'];
			$temp_data[$key][] = $item;
		}

		return $temp_data;
	}


	/**
	 * Kiem tra 1 node menu co menu con khong
	 * @param $node_id [id cua node]
	 * @return boolean
	 */
	public function has_children($node_id) {
		$temp_data = $this->prepare_data();
		return isset ( $temp_data[$node_id] );
	}

	

	/***************************************************************************************
	 * @param  array $data
	 * @param  integer $parent_id
	 * @return print sub menu
	 ***************************************************************************************/
	public function _print_menu($data, $parent_id = 0) {
		if ( isset( $data[$parent_id] ) ) {
			//prepare ul
			$open_ul = '<ul ';
			if ( $parent_id == 0 ) { //for first ul
				if ( ! empty ( $this->wrap_ul_class ) )
					$open_ul .= 'class = "' . $this->wrap_ul_class . '" ';

				if ( ! empty ( $this->wrap_ul_id ) )
					$open_ul .= 'id = "' . $this->wrap_ul_id .'" ';
			} 
			else { //for sub ul
				if ( ! empty ( $this->sub_ul_class ) )
					$open_ul .= 'class = "' . $this->sub_ul_class .'" ';
			}
			$open_ul .= '>';	
			echo $open_ul;

			/******************** start print node menu ***************************/
			foreach ( $data[$parent_id] as $node ) {
				//prepare for li
				$open_li = '<li class = "';
				if ( $parent_id == 0 ) {
					if ( ! empty ( $this->top_parent_li_class ) ) 
						$open_li .=  $this->top_parent_li_class.' ';
					if ( $this->has_children( $node['id'] ) && ! empty ($this->parent_li_has_sub_class ) )
						$open_li .= $this->parent_li_has_sub_class ;
				} else {
					if ( ! empty ( $this->parent_li_has_sub_class ) )
						$open_li .= $this->parent_li_has_sub_class;
				}
				$open_li .= ' " >'; 
				//prepare for a tag
				$open_link_class = ' class = " ';
				$open_link_attr = '';
				if ( $parent_id == 0 ) {
					//for top parent link
					if ( ! empty( $this->top_parent_link_class ) ) {
						$open_link_class .= $this->top_parent_link_class . ' ';
					}
					if ( ! empty( $this->top_parent_link_attr ) ) {
						foreach ( $this->top_parent_link_attr as $attr => $value ) {
							$open_link_attr .= $attr . '="'. $value .'"';
						}
					}
				}

				if ( $this->has_children( $node['id'] ) ) {
					//for li has sub
					if ( ! empty( $this->link_has_sub_class ) ) {
						$open_link_class .= $this->link_has_sub_class . ' ';
					}
					if ( ! empty( $this->link_has_sub_attr ) ) {
						foreach ( $this->link_has_sub_attr as $attr => $value ) {
							$open_link_attr .= $attr . '="'. $value .'"';
						}
					}
				}

				if ( $parent_id != 0 && ! $this->has_children( $node['id'] ) ) {
					//for common link
					if ( ! empty( $this->link_class ) ) {
						$open_link_class .= $this->link_class . ' ';
					}
					if ( ! empty( $this->link_attr ) ) {
						foreach ( $this->link_attr as $attr => $value ) {
							$open_link_attr .= $attr . '="'. $value .'"';
						}
					}
				}
				
				$open_link_class .= ' " ';

				$open_link = '<a href = "'.  $node['link'] .'" alt = "'. $node['title'] .' " ';
				$open_link .= $open_link_class;
				$open_link .= $open_link_attr;
				$open_link .= '>'; 

				echo $open_li; // open li tag
				echo $open_link; // open a tag
				echo $node['title'];
				echo '</a>';
				//print child and child... menu
				$this->_print_menu(  $data, $node['id'] );
				echo '</li>';
			}

			echo '</ul>';
		}
	}


	public function print_menu() {

		//check swap tag
		if ( ! empty( $this->wrap_tag ) ) 
			echo '<' . $this->wrap_tag . ' class = " '. $this->wrap_tag_class .' " id=" '. $this->wrap_tag_id .' ">';

		$menu_prepared = $this->prepare_data($this->data);
		$this->_print_menu($menu_prepared);


		if ( ! empty( $this->wrap_tag ) ) 
			echo '</' . $this->wrap_tag . '>';
	}



}

?>