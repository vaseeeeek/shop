<?php

/**
 * Class shopFrontendAction
 * @method shopConfig getConfig()
 */
class shopFrontendAction extends waViewAction
{
    public function __construct($params = null)
    {
        parent::__construct($params);

        if (!waRequest::isXMLHttpRequest()) {
            $this->setLayout(new shopFrontendLayout());
        }
    }

    /**
     * @deprecated
     */
    public function addCanonical()
    {

    }

    public function getStoreName()
    {
        $title = waRequest::param('title');
        if (!$title) {
            $title = $this->getConfig()->getGeneralSettings('name');
        }
        if (!$title) {
            $app = wa()->getAppInfo();
            $title = $app['name'];
        }
        return htmlspecialchars($title);
    }

    /**
     * @param shopProductsCollection $collection
     * @throws waException
     */
    protected function setCollection(shopProductsCollection $collection)
    {
        $collection->filters(waRequest::get());
        $limit = (int)waRequest::cookie('products_per_page');
        if (!$limit || $limit < 0 || $limit > 500) {
            $limit = (int)waRequest::param('products_per_page');
            if (!$limit || $limit < 0 || $limit > 500) {
                $limit = $this->getConfig()->getOption('products_per_page');
            }
        }

        $page = waRequest::get('page', 1, 'int');
        if ($page < 1) {
            $page = 1;
        }
        $offset = ($page - 1) * $limit;

        $collection->setOptions(array(
            'overwrite_product_prices' => true,
        ));
        $skus_field = 'skus_filtered';
        if (wa()->getConfig()->getOption('frontend_collection_all_skus') === false) {
            $skus_field = 'sku_filtered';
        }
        $products = $collection->getProducts('*,skus_image,' . $skus_field, $offset, $limit);

        $count = $collection->count();

        $pages_count = ceil((float)$count / $limit);
        $this->view->assign('pages_count', $pages_count);

        $this->view->assign('products', $products);
        $this->view->assign('products_count', $count);
    }

    public function execute()
    {
        if (strlen(wa()->getRouting()->getCurrentUrl())) {
            throw new waException(_ws('Page not found'), 404);
        }
        $title = waRequest::param('title');
        if (!$title) {
            $app = wa()->getAppInfo();
            $title = $app['name'];
        }
        $this->getResponse()->setTitle($title);
        $this->getResponse()->setMeta('keywords', waRequest::param('meta_keywords'));
        $this->getResponse()->setMeta('description', waRequest::param('meta_description'));


        // Open Graph
        $og_url = null;
        foreach (array('title', 'image', 'video', 'description', 'type', 'url') as $k) {
            if (waRequest::param('og_'.$k)) {
                if (($k == 'url') && strlen(waRequest::param('og_'.$k))) {
                    $og_url = false;
                } elseif ($og_url === null) {
                    $og_url = true;
                }
                $this->getResponse()->setOGMeta('og:'.$k, waRequest::param('og_'.$k));
            }
        }
        if ($og_url) {
            $og_url = wa()->getConfig()->getHostUrl().wa()->getConfig()->getRequestUrl(false, true);
            $this->getResponse()->setOGMeta('og:url', $og_url);
        }

        /**
         * @event frontend_homepage
         * @return array[string]string $return[%plugin_id%] html output for head section
         */
        $this->view->assign('frontend_homepage', wa()->event('frontend_homepage'));

        $this->setThemeTemplate('home.html');

    }

    public function display($clear_assign = true)
    {
        /**
         * @event frontend_nav
         * @return array[string]string $return[%plugin_id%] html output for navigation section
         */
        $this->view->assign('frontend_nav', wa()->event('frontend_nav'));

        /**
         * @event frontend_nav_aux
         * @return array[string]string $return[%plugin_id%] html output for navigation section
         */
        $this->view->assign('frontend_nav_aux', wa()->event('frontend_nav_aux'));

        // set globals
        $params = waRequest::param();
        foreach ($params as $k => $v) {
            if (in_array($k, array('url', 'module', 'action', 'meta_keywords', 'meta_description', 'private',
                'url_type', 'type_id', 'payment_id', 'shipping_id', 'currency', 'stock_id', 'public_stocks'))) {
                unset($params[$k]);
            }
        }
        $this->view->getHelper()->globals($params);

        try {
            return parent::display(false);
        } catch (waException $e) {
            if ($e->getCode() == 404) {
                $url = $this->getConfig()->getRequestUrl(false, true);
                if (substr($url, -1) !== '/' && strpos(substr($url, -5), '.') === false) {
                    wa()->getResponse()->redirect($url.'/', 301);
                }
            }
            /**
             * @event frontend_error
             */
            wa()->event('frontend_error', $e);
            $this->view->assign('error_message', $e->getMessage());
            $code = $e->getCode();
            $this->view->assign('error_code', $code);
            $this->getResponse()->setStatus($code ? $code : 500);
            $this->setThemeTemplate('error.html');
            return $this->view->fetch($this->getTemplate());
        }
    }
}
