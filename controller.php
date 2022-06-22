<?php
class controller{
    private static $public ;
    public  static function  check_message($text){
     switch ($text){
         case '/start':
              self::start();
             break;
         case 'دیدن سوال':
             self::starter_question();
             break;
         default:
             self::run_game($text);
             break;
      }


}

    public static function run_game($text){
        if($text == 'بالون'){
            Telegramlib::send_message('شما برنده شدید 🥇🎊',controller::$public['message']['chat']['id']);
        }else{
            Telegramlib::send_message('پاسخ شما صحیح نبود 😓',controller::$public['message']['chat']['id']);

        }
    }
    public static function handle($update){
        controller::$public = $update;
       $text = $update['message']['text'];

        controller::check_message($text);
    }
    public static function start(){
       $_keyboard = telegramlib::make_keyword(
            [
                [["text"=>"دیدن سوال"]]
            ]
        );
      $text = " به ربات  بازی حدس کلمه خوش امدید.\n
      برای شروع بازی دکمه شروع بازی را کلیک کنید 
      ";
        telegramlib::send_message($text,controller::$public['message']['chat']['id'],$_keyboard);
    }
    public static function starter_question(){
        telegramlib::send_message("🏀🔛",controller::$public['message']['chat']['id']);
    }
}



