<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Blogs_model extends CI_Model
    {
        public function __construct()
        {

        }

        public function get_blog($user_id)
        {
            $query = $this->db->get_where('blogs', array('user_id' => $user_id));
            $row = $query->first_row();

            $posts = $this->posts_model->get_posts($row->user_id);
            //$pages = $this->pages_model->get_pages($row->user_id);

            $blog = new Blog(
                $row->blog_id,
                $row->user_id,
                $row->name,
                $row->description,
                $row->created,
                $row->modified,
                $posts,
                null,
                $row->about,
                $row->style
            );
            return $blog;
        }

        public function get_blog_by_username($username)
        {
            $user = $this->users_model->get_user_by_username($username);
            $query = $this->db->get_where('blogs', array('user_id' => $user->getId()));
            $row = $query->first_row();

            $posts = $this->posts_model->get_posts($row->blog_id);
            //$pages = $this->pages_model->get_pages($row->user_id);

            $blog = new Blog(
                $row->blog_id,
                $row->user_id,
                $row->name,
                $row->description,
                $row->created,
                $row->modified,
                $posts,
                null,
                $row->about,
                $row->style
            );
            return $blog;
        }
    }

    class Blog extends CI_Model
    {
        private $blog_id;
        private $user_id;

        private $name;
        private $description;

        private $created;
        private $modified;

        private $posts;
        private $pages;
        private $about;

        private $style;

        /**
         * Blog constructor.
         * @param $blog_id
         * @param $user_id
         * @param $name
         * @param $description
         * @param $created
         * @param $modified
         * @param $posts
         * @param $pages
         * @param $about
         * @param $style
         */
        public function __construct($blog_id, $user_id, $name, $description, $created, $modified, $posts, $pages, $about, $style)
        {
            $this->blog_id = $blog_id;
            $this->user_id = $user_id;
            $this->name = $name;
            $this->description = $description;
            $this->created = $created;
            $this->modified = $modified;
            $this->posts = $posts;
            $this->pages = $pages;
            $this->about = $about;
            $this->style = $style;
        }

        /**
         * @return mixed
         */
        public function getBlogId()
        {
            return $this->blog_id;
        }

        /**
         * @return mixed
         */
        public function getUserId()
        {
            return $this->user_id;
        }

        /**
         * @return mixed
         */
        public function getUser()
        {
            return $this->users_model->get_user($this->user_id);
        }

        /**
         * @return mixed
         */
        public function getName()
        {
            return $this->settings_model->get_setting('name', $this->user_id);
        }

        public function getArchive()
        {
            return $this->posts_model->get_archive($this->blog_id);
        }

        public function getSidebarArchive()
        {
            return $this->posts_model->get_sidebar_archive($this->blog_id);
        }

        /**
         * @return mixed
         */
        public function getCreated()
        {
            return $this->created;
        }

        /**
         * @return mixed
         */
        public function getModified()
        {
            return $this->modified;
        }

        /**
         * @return mixed
         */
        public function getPosts($pagination = true, $published = true)
        {
            if($pagination)
            {
                $limit = $this->settings_model->get_setting('posts_per_page', $this->user_id);
                $offset = ( $this->input->get('page') ?? 1 ) * $limit- $limit;
            }
            return $this->posts_model->get_posts($this->blog_id, $limit ?? null, $offset ?? 0, $published);
        }

        public function hasNextPage()
        {
            $limit = $this->settings_model->get_setting('posts_per_page', $this->user_id);
            $offset = ( $this->input->get('page') ?? 1 ) * $limit;

            return $this->posts_model->get_posts($this->blog_id, $limit, $offset);
        }

        public function hasPreviousPage()
        {
            return ( $this->input->get('page') ?? 1 ) > 1;
        }

        /**
         * @return mixed
         */
        public function getPages()
        {
            return $this->pages_model->get_pages($this->blog_id);
        }

        /**
         * @return mixed
         */
        public function getAbout()
        {
            return $this->settings_model->get_setting('about', $this->user_id);
        }

        public function getAvatar()
        {
            return $this->settings_model->get_setting('avatar', $this->user_id);
        }

        public function getDescription()
        {
            return $this->settings_model->get_setting('description', $this->user_id);
        }

        public function getHeader()
        {
            return $this->settings_model->get_setting('header_image', $this->user_id);
        }

        /**
         * @return mixed
         */
        public function getStyle()
        {
            return $this->settings_model->get_setting('css', $this->user_id);
        }
    }