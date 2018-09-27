<?php
/**
 * Author: Glen Mark Mananquil
 * Author URI: mailto:gmarkmananquil@gmail.com
 *
 */

namespace LoginSignup;

define("LOGIN_SIGNUP_DIRECTORY", dir(__FILE__));

if(!defined("DS")) define("DS", DIRECTORY_SEPARATOR);

class LoginSignup{

    /**
     * Path location for login view
     *
     *
     */
    const VIEW_LOGIN = "templates/login_view.php";

    /**
     * Path location for register view
     *
     */
    const VIEW_REGISTER = "templates/register_view.php";

    /**
     * The name of our submit button, we need to define the name inorder to check if the login/register submit button has been pressed
     *
     */
    private $submit_button_name;

    /**
     * The action name for login
     *
     */
    private $login_action_name;


    /**
     * The action name for register
     *
     */
    private $register_action_name;


    /**
     * Singleton Instance
     */
    private static $instance = null;


    public function __construct(){

        /**
         * This will make the button appear, after forgot password link
         */
        add_action("login_signup-submit-button", array($this, "submitButton"));
    }

    /**
     * This hooks to shortcode, accepts whatever type of shortcode you want
     * default - login_signup
     *
     * e.g. [login_signup action="login"], [login_signup action="register"]
     */
    public function generateShortcode($shortcode){
    }

    /**
     * Display login html
     */
    public function loginView(){

        do_action("login_signup-before-login-form");
        echo "<form method='post'>";
        echo '<input type="hidden" name="action" value="'. $this->login_action_name . '" />'
        require_once(LOGIN_SIGNUP_DIRECTORY . DS . LoginSignup.VIEW_LOGIN);
        echo "</form>";
        do_action("login_signup-after-login-form");

    }

    /**
     * Display register html
     */
    public function registerView(){

        do_action("login_signup-before-register-form");

        echo "<form method='post'>";
        echo '<input type="hidden" name="action" value="'. $this->login_action_name . '" />'
        require_once(LOGIN_SIGNUP_DIRECTORY . DS . LoginSignup.VIEW_REGISTER);
        echo "</form>";

        do_action("login_signup-after-register-form");

    }


    //get submit button, we have to regulate the name of the submit button
    //in order to check if there is submit happening
    public function submitButton(){

        $login_label = apply_filter("login_signup-");
        ?>
        <input type="submit" name="<?php echo $this->submit_button_name; ?>" value="Login" />
        <?php
    }




    public static function create(){
        if(self::$instance == null )
            self::$instance = new self;

        return self::$instance;
    }

}



/** USAGE

$loginSignup = LoginSignup::create();
$loginSignup->generateShortcode();

//either use in shortcode or embedded into code

$loginSignup->loginView();
$loginSignup->registerView();



**/
