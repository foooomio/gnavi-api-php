<?php
namespace Gnavi\Util;

class ForeignRefiner
{
    const ENGLISH_SPEAKING_STAFF   = 'english_speaking_staff';   // 英語が話せるスタッフがいる
    const ENGLISH_MENU             = 'english_menu';             // 英語メニューあり
    const KOREAN_SPEAKING_STAFF    = 'korean_speaking_staff';    // 韓国語が話せるスタッフがいる
    const KOREAN_MENU              = 'korean_menu';              // 韓国語メニューあり
    const CHINESE_SPEAKING_STAFF   = 'chinese_speaking_staff';   // 中国語が話せるスタッフがいる
    const SIMPLIFIED_CHINESE_MENU  = 'simplified_chinese_menu';  // 中国語(簡体字)メニューあり
    const TRADITIONAL_CHINESE_MENU = 'traditional_chinese_menu'; // 中国語(繁体字)メニューあり
    const VEGETARIAN_MENU_OPTIONS  = 'vegetarian_menu_options';  // ベジタリアンメニュー相談可
    const RELIGIOUS_MENU_OPTIONS   = 'religious_menu_options';   // 国・宗教別メニュー相談可
    const WIFI                     = 'wifi';                     // wifi利用可
    const CARD                     = 'card';                     // カード利用可
    const PRIVATE_ROOM             = 'private_room';             // 個室あり
    const NO_SMOKING               = 'no_smoking';               // 禁煙席あり
}
