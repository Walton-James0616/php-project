<style type="text/css">
	
    #cover {
        background: url(<?php echo e(asset('assets/images/'.$gs->loader)); ?>) no-repeat scroll center center #FFF;
        position: fixed;
        height: 100%;
        width: 100%;
        z-index: 9999;
        }

/*Handyman color: #0099ff*/
.section-borders span.black-border {
    background-color: <?php echo e($gs->colors == null ? '#0099ff':$gs->colors); ?>;
}
.header-top-area {
    background-color: <?php echo e($gs->colors == null ? '#0099ff':$gs->colors); ?>;
}

.header-top-area .top-social-links li a:hover {color: <?php echo e($gs->colors == null ? '#0099ff':$gs->colors); ?>;}

.header-top-area .top-social-links .top-social-links-li a:hover {color: <?php echo e($gs->colors == null ? '#0099ff':$gs->colors); ?>;}

.header-area-wrapper {
    border-top: 1px solid <?php echo e($gs->colors == null ? '#0099ff':$gs->colors); ?>;
    border-bottom: 1px solid <?php echo e($gs->colors == null ? '#0099ff':$gs->colors); ?>;
}

.mainmenu li ul {
    border-top: 3px solid <?php echo e($gs->colors == null ? '#0099ff':$gs->colors); ?>;
}
.mainmenu li ul li {
    border-bottom: 1px solid <?php echo e($gs->colors == null ? '#0099ff':$gs->colors); ?>;
}
.slicknav_btn {
    background-color: <?php echo e($gs->colors == null ? '#0099ff':$gs->colors); ?>; 
}

.slicknav_nav {
    background-color: <?php echo e($gs->colors == null ? '#0099ff':$gs->colors); ?>; 

}
.slicknav_nav .slicknav_row:hover, .slicknav_nav a:hover {
    background-color: <?php echo e($gs->colors == null ? '#0099ff':$gs->colors); ?>; 
}

.hero-form {
    background-color: <?php echo e($gs->colors == null ? '#0099ff':$gs->colors); ?>ad;
}

.hero-btn {background-color: <?php echo e($gs->colors == null ? '#0099ff':$gs->colors); ?>;}

.profile-contact-area .btn {background: <?php echo e($gs->colors == null ? '#0099ff':$gs->colors); ?>; border-color: <?php echo e($gs->colors == null ? '#0099ff':$gs->colors); ?>;}

.team_style2 .team_common{
    border: 1px solid <?php echo e($gs->colors == null ? '#0099ff':$gs->colors); ?>;
}
.team_style2 .member_info .overlay2 {
    background: <?php echo e($gs->colors == null ? '#0099ff':$gs->colors); ?> none repeat scroll 0 0; 
}
.testimonial-wrapper .section-borders span.black-border {background-color: <?php echo e($gs->colors == null ? '#0099ff':$gs->colors); ?>;}
.testimonial-wrapper .owl-prev,
.testimonial-wrapper .owl-next {
    box-shadow: 0 0 1px <?php echo e($gs->colors == null ? '#0099ff':$gs->colors); ?>;
    background-color: <?php echo e($gs->colors == null ? '#0099ff':$gs->colors); ?>;
}
.single-blog-box {
    border: 1px solid <?php echo e($gs->colors == null ? '#0099ff':$gs->colors); ?>;
}
.boxed-btn.blog {
    background-color: <?php echo e($gs->colors == null ? '#0099ff':$gs->colors); ?>;
    border: 1px solid <?php echo e($gs->colors == null ? '#0099ff':$gs->colors); ?>; 
}
.boxed-btn.blog:hover {color: <?php echo e($gs->colors == null ? '#0099ff':$gs->colors); ?>; border-color: <?php echo e($gs->colors == null ? '#0099ff':$gs->colors); ?>;}

.blog-area-wrapper .owl-carousel .owl-nav .owl-prev,
.blog-area-wrapper .owl-carousel .owl-nav .owl-next {
    color: <?php echo e($gs->colors == null ? '#0099ff':$gs->colors); ?>;
}

.post-heading {border-bottom: 2px solid <?php echo e($gs->colors == null ? '#0099ff':$gs->colors); ?>;}

.post-sidebar-area li a:hover {color: <?php echo e($gs->colors == null ? '#0099ff':$gs->colors); ?>;}
.single-all-blogs-box {
    border: 1px solid <?php echo e($gs->colors == null ? '#0099ff':$gs->colors); ?>;
}
.comments-form input[type="submit"], 
.comments-form button[type="submit"]  {
    background-color: <?php echo e($gs->colors == null ? '#0099ff':$gs->colors); ?>;
    border: 1px solid <?php echo e($gs->colors == null ? '#0099ff':$gs->colors); ?>;
}
.comments-form input[type="submit"]:hover, 
button[type="submit"]:hover {
    border: 1px solid <?php echo e($gs->colors == null ? '#0099ff':$gs->colors); ?>;
    color: <?php echo e($gs->colors == null ? '#0099ff':$gs->colors); ?>;
}

.contact-info i.fa {
    color: <?php echo e($gs->colors == null ? '#0099ff':$gs->colors); ?>;
}

.styled-faq .panel-title {background-color: <?php echo e($gs->colors == null ? '#0099ff':$gs->colors); ?>;}

.subscribe-newsletter-area {
    background-color: <?php echo e($gs->colors == null ? '#0099ff':$gs->colors); ?>;
}
.login-form {
    border: 1px solid <?php echo e($gs->colors == null ? '#0099ff':$gs->colors); ?>;
}
.login-icon {
    background-color: <?php echo e($gs->colors == null ? '#0099ff':$gs->colors); ?>;
}
.login-title {
    background-color: <?php echo e($gs->colors == null ? '#0099ff':$gs->colors); ?>;
}
.login-area .section-borders span {
    background-color: <?php echo e($gs->colors == null ? '#0099ff':$gs->colors); ?>;
}

.login-form .input-group-addon {
    color: <?php echo e($gs->colors == null ? '#0099ff':$gs->colors); ?>;
}

.login-btn {
    background-color: <?php echo e($gs->colors == null ? '#0099ff':$gs->colors); ?>;
}

            .pagination>.disabled>a:focus, 
            .pagination>.disabled>a:hover, 
            .pagination>.disabled>span, 
            .pagination>.disabled>span:focus, 
            .pagination>.disabled>span:hover {
                color: <?php echo e($gs->colors == null ? '#0099ff':$gs->colors); ?>;
            }

            .pagination>.disabled>a, 
            .pagination>.disabled>a:focus, 
            .pagination>.disabled>a:hover, 
            .pagination>.disabled>span, 
            .pagination>.disabled>span:focus, 
            .pagination>.disabled>span:hover {
                border-color: <?php echo e($gs->colors == null ? '#0099ff':$gs->colors); ?>;
            }

            .pagination>.active>a, 
            .pagination>.active>a:focus, 
            .pagination>.active>a:hover, 
            .pagination>.active>span, 
            .pagination>.active>span:focus, 
            .pagination>.active>span:hover {
                background-color: <?php echo e($gs->colors == null ? '#0099ff':$gs->colors); ?>;
                border-color: <?php echo e($gs->colors == null ? '#0099ff':$gs->colors); ?>;

            }
            .pagination>li>a, .pagination>li>span {
                border: 1px solid <?php echo e($gs->colors == null ? '#0099ff':$gs->colors); ?>;

            }
            .pagination>li>a, .pagination>li>span {
                color: <?php echo e($gs->colors == null ? '#0099ff':$gs->colors); ?>;
                border: 1px solid <?php echo e($gs->colors == null ? '#0099ff':$gs->colors); ?>;
            }
.pagination>li>a:focus, .pagination>li>a:hover, .pagination>li>span:focus, .pagination>li>span:hover {
    border-color: <?php echo e($gs->colors == null ? '#0099ff':$gs->colors); ?>;
}

</style>