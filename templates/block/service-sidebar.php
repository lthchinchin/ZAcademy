<div class="garden-service-sidebar">
    <div class="row g-4 mb-lg-5 mb-4">
        <?php
        $taxonomy_name = 'danh-muc-dich-vu';
        $term_current = get_queried_object();
        $termchildren = get_term_children(!$term_current->parent ? $term_current->term_id : $term_current->parent, $taxonomy_name);
        foreach ($termchildren as $child_id) {
            $term = get_term_by('id', $child_id, $taxonomy_name);
        ?>
            <div class="col-12 "><a href="<?php echo get_term_link($child_id, $taxonomy_name) ?>"><button class="btn text-start cate-item <?php echo $child_id == $term_current->term_id ? 'active' : '' ?>"><?php echo $term->name; ?>
                    </button></a></div>
        <?php } ?>
    </div>
    <div class="contact-thumb">
        <a href="tel:0777148777">
            <img src="<?php echo get_template_directory_uri() ?>/assets/images/CTA.jpg" alt="">
        </a>
    </div>
</div>