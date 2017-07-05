# Menu-generate-from-array
Class help generate menu structure from an array

#usage:

data for generate menu is an array has node is array with key:
id, title, link, paren

$menu = QH_Menu($data, $args);
$menu->print_menu();

key of args

 *	+ wrap_tag: tag wrap for menu
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

