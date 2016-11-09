<?php
/*
 * アーカイブページヘッダー部分
 */
echo
'<h2 class="l-archive_header">', $wp_query->found_posts, '件の', get_post_type_object( $post_type )->labels->name, 'を公開しています。</h2>';