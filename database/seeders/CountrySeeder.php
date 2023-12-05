<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::create([
            'country_code'=>'AF','country_enName'=>'Afghanistan','country_arName'=>'أفغانستان','country_enNationality'=>'Afghan','country_arNationality'=>'أفغانستاني'
        ]);
        Country::create([
            'country_code'=>'AL','country_enName'=>'Albania','country_arName'=>'ألبانيا','country_enNationality'=>'Albanian','country_arNationality'=>'ألباني'
        ]);
        Country::create([
            'country_code'=>'AX','country_enName'=>'Aland Islands','country_arName'=>'جزر آلاند','country_enNationality'=>'Aland Islander','country_arNationality'=>'آلاندي'
        ]);
        Country::create([
            'country_code'=>'DZ','country_enName'=>'Algeria','country_arName'=>'الجزائر','country_enNationality'=>'Algerian','country_arNationality'=>'جزائري'
        ]);
        Country::create([
            'country_code'=>'AD','country_enName'=>'Andorra','country_arName'=>'أندورا','country_enNationality'=>'Andorran','country_arNationality'=>'أندوري'
        ]);
        Country::create([
            'country_code'=>'AO','country_enName'=>'Angola','country_arName'=>'أنغولا','country_enNationality'=>'Angolan','country_arNationality'=>'أنقولي'
        ]);
        Country::create([
            'country_code'=>'AI','country_enName'=>'Anguilla','country_arName'=>'أنغويلا','country_enNationality'=>'Anguillan','country_arNationality'=>'أنغويلي'
        ]);
        Country::create([
            'country_code'=>'AQ','country_enName'=>'Antarctica','country_arName'=>'أنتاركتيكا','country_enNationality'=>'Antarctican','country_arNationality'=>'أنتاركتيكي'
        ]);
        Country::create([
            'country_code'=>'AG','country_enName'=>'Antigua and Barbuda','country_arName'=>'أنتيغوا وبربودا','country_enNationality'=>'Antiguan','country_arNationality'=>'بربودي'
        ]);
        Country::create([
            'country_code'=>'AR','country_enName'=>'Argentina','country_arName'=>'الأرجنتين','country_enNationality'=>'Argentinian','country_arNationality'=>'أرجنتيني'
        ]);
        Country::create([
            'country_code'=>'AM','country_enName'=>'Armenia','country_arName'=>'أرمينيا','country_enNationality'=>'Armenian','country_arNationality'=>'أرميني'
        ]);
        Country::create([
            'country_code'=>'AW','country_enName'=>'Aruba','country_arName'=>'أروبه','country_enNationality'=>'Aruban','country_arNationality'=>'أوروبهيني'
        ]);
        Country::create([
            'country_code'=>'AU','country_enName'=>'Australia','country_arName'=>'أستراليا','country_enNationality'=>'Australian','country_arNationality'=>'أسترالي'
        ]);
        Country::create([
            'country_code'=>'AT','country_enName'=>'Austria','country_arName'=>'النمسا','country_enNationality'=>'Austrian','country_arNationality'=>'نمساوي'
        ]);
        Country::create([
            'country_code'=>'AZ','country_enName'=>'Azerbaijan','country_arName'=>'أذربيجان','country_enNationality'=>'Azerbaijani','country_arNationality'=>'أذربيجاني'
        ]);
        Country::create([
            'country_code'=>'BS','country_enName'=>'Bahamas','country_arName'=>'الباهاماس','country_enNationality'=>'Bahamian','country_arNationality'=>'باهاميسي'
        ]);
        Country::create([
            'country_code'=>'BH','country_enName'=>'Bahrain','country_arName'=>'البحرين','country_enNationality'=>'Bahraini','country_arNationality'=>'بحريني'
        ]);
        Country::create([
            'country_code'=>'BD','country_enName'=>'Bangladesh','country_arName'=>'بنغلاديش','country_enNationality'=>'Bangladeshi','country_arNationality'=>'بنغلاديشي'
        ]);
        Country::create([
            'country_code'=>'BB','country_enName'=>'Barbados','country_arName'=>'بربادوس','country_enNationality'=>'Barbadian','country_arNationality'=>'بربادوسي'
        ]);
        Country::create([
            'country_code'=>'BY','country_enName'=>'Belarus','country_arName'=>'روسيا البيضاء','country_enNationality'=>'Belarusian','country_arNationality'=>'روسي'
        ]);
        Country::create([
            'country_code'=>'BE','country_enName'=>'Belgium','country_arName'=>'بلجيكا','country_enNationality'=>'Belgian','country_arNationality'=>'بلجيكي'
        ]);
        Country::create([
            'country_code'=>'BZ','country_enName'=>'Belize','country_arName'=>'بيليز','country_enNationality'=>'Belizean','country_arNationality'=>'بيليزي'
        ]);
        Country::create([
            'country_code'=>'BJ','country_enName'=>'Benin','country_arName'=>'بنين','country_enNationality'=>'Beninese','country_arNationality'=>'بنيني'
        ]);
        Country::create([
            'country_code'=>'BL','country_enName'=>'Saint Barthelemy','country_arName'=>'سان بارتيلمي','country_enNationality'=>'Saint Barthelmian','country_arNationality'=>'سان بارتيلمي'
        ]);
        Country::create([
            'country_code'=>'BM','country_enName'=>'Bermuda','country_arName'=>'جزر برمودا','country_enNationality'=>'Bermudan','country_arNationality'=>'برمودي'
        ]);
        Country::create([
            'country_code'=>'BT','country_enName'=>'Bhutan','country_arName'=>'بوتان','country_enNationality'=>'Bhutanese','country_arNationality'=>'بوتاني'
        ]);
        Country::create([
            'country_code'=>'BO','country_enName'=>'Bolivia','country_arName'=>'بوليفيا','country_enNationality'=>'Bolivian','country_arNationality'=>'بوليفي'
        ]);
        Country::create([
            'country_code'=>'BA','country_enName'=>'Bosnia and Herzegovina','country_arName'=>'البوسنة و الهرسك','country_enNationality'=>'Bosnian \/ Herzegovinian','country_arNationality'=>'بوسني\/هرسكي'
        ]);
        Country::create([
            'country_code'=>'BW','country_enName'=>'Botswana','country_arName'=>'بوتسوانا','country_enNationality'=>'Botswanan','country_arNationality'=>'بوتسواني'
        ]);
        Country::create([
            'country_code'=>'BV','country_enName'=>'Bouvet Island','country_arName'=>'جزيرة بوفيه','country_enNationality'=>'Bouvetian','country_arNationality'=>'بوفيهي'
        ]);
        Country::create([
            'country_code'=>'BR','country_enName'=>'Brazil','country_arName'=>'البرازيل','country_enNationality'=>'Brazilian','country_arNationality'=>'برازيلي'
        ]);
        Country::create([
            'country_code'=>'IO','country_enName'=>'British Indian Ocean Territory','country_arName'=>'إقليم المحيط الهندي البريطاني','country_enNationality'=>'British Indian Ocean Territory','country_arNationality'=>'إقليم المحيط الهندي البريطاني'
        ]);
        Country::create([
            'country_code'=>'BN','country_enName'=>'Brunei Darussalam','country_arName'=>'بروني','country_enNationality'=>'Bruneian','country_arNationality'=>'بروني'
        ]);
        Country::create([
            'country_code'=>'BG','country_enName'=>'Bulgaria','country_arName'=>'بلغاريا','country_enNationality'=>'Bulgarian','country_arNationality'=>'بلغاري'
        ]);
        Country::create([
            'country_code'=>'BF','country_enName'=>'Burkina Faso','country_arName'=>'بوركينا فاسو','country_enNationality'=>'Burkinabe','country_arNationality'=>'بوركيني'
        ]);
        Country::create([
            'country_code'=>'BI','country_enName'=>'Burundi','country_arName'=>'بوروندي','country_enNationality'=>'Burundian','country_arNationality'=>'بورونيدي'
        ]);
        Country::create([
            'country_code'=>'KH','country_enName'=>'Cambodia','country_arName'=>'كمبوديا','country_enNationality'=>'Cambodian','country_arNationality'=>'كمبودي'
        ]);
        Country::create([
            'country_code'=>'CM','country_enName'=>'Cameroon','country_arName'=>'كاميرون','country_enNationality'=>'Cameroonian','country_arNationality'=>'كاميروني'
        ]);
        Country::create([
            'country_code'=>'CA','country_enName'=>'Canada','country_arName'=>'كندا','country_enNationality'=>'Canadian','country_arNationality'=>'كندي'
        ]);
        Country::create([
            'country_code'=>'CV','country_enName'=>'Cape Verde','country_arName'=>'الرأس الأخضر','country_enNationality'=>'Cape Verdean','country_arNationality'=>'الرأس الأخضر'
        ]);
        Country::create([
            'country_code'=>'KY','country_enName'=>'Cayman Islands','country_arName'=>'جزر كايمان','country_enNationality'=>'Caymanian','country_arNationality'=>'كايماني'
        ]);
        Country::create([
            'country_code'=>'CF','country_enName'=>'Central African Republic','country_arName'=>'جمهورية أفريقيا الوسطى','country_enNationality'=>'Central African','country_arNationality'=>'أفريقي'
        ]);
        Country::create([
            'country_code'=>'TD','country_enName'=>'Chad','country_arName'=>'تشاد','country_enNationality'=>'Chadian','country_arNationality'=>'تشادي'
        ]);
        Country::create([
            'country_code'=>'CL','country_enName'=>'Chile','country_arName'=>'شيلي','country_enNationality'=>'Chilean','country_arNationality'=>'شيلي'
        ]);
        Country::create([
            'country_code'=>'CN','country_enName'=>'China','country_arName'=>'الصين','country_enNationality'=>'Chinese','country_arNationality'=>'صيني'
        ]);
        Country::create([
            'country_code'=>'CX','country_enName'=>'Christmas Island','country_arName'=>'جزيرة عيد الميلاد','country_enNationality'=>'Christmas Islander','country_arNationality'=>'جزيرة عيد الميلاد'
        ]);
        Country::create([
            'country_code'=>'CC','country_enName'=>'Cocos (Keeling) Islands','country_arName'=>'جزر كوكوس','country_enNationality'=>'Cocos Islander','country_arNationality'=>'جزر كوكوس'
        ]);
        Country::create([
            'country_code'=>'KM','country_enName'=>'Comoros','country_arName'=>'جزر القمر','country_enNationality'=>'Comorian','country_arNationality'=>'جزر القمر'
        ]);
        Country::create([
            'country_code'=>'CG','country_enName'=>'Congo','country_arName'=>'الكونغو','country_enNationality'=>'Congolese','country_arNationality'=>'كونغي'
        ]);
        Country::create([
            'country_code'=>'CK','country_enName'=>'Cook Islands','country_arName'=>'جزر كوك','country_enNationality'=>'Cook Islander','country_arNationality'=>'جزر كوك'
        ]);
        Country::create([
            'country_code'=>'CR','country_enName'=>'Costa Rica','country_arName'=>'كوستاريكا','country_enNationality'=>'Costa Rican','country_arNationality'=>'كوستاريكي'
        ]);
        Country::create([
            'country_code'=>'HR','country_enName'=>'Croatia','country_arName'=>'كرواتيا','country_enNationality'=>'Croatian','country_arNationality'=>'كوراتي'
        ]);
        Country::create([
            'country_code'=>'CU','country_enName'=>'Cuba','country_arName'=>'كوبا','country_enNationality'=>'Cuban','country_arNationality'=>'كوبي'
        ]);
        Country::create([
            'country_code'=>'CY','country_enName'=>'Cyprus','country_arName'=>'قبرص','country_enNationality'=>'Cypriot','country_arNationality'=>'قبرصي'
        ]);
        Country::create([
            'country_code'=>'CW','country_enName'=>'Curaçao','country_arName'=>'كوراساو','country_enNationality'=>'Curacian','country_arNationality'=>'كوراساوي'
        ]);
        Country::create([
            'country_code'=>'CZ','country_enName'=>'Czech Republic','country_arName'=>'الجمهورية التشيكية','country_enNationality'=>'Czech','country_arNationality'=>'تشيكي'
        ]);
        Country::create([
            'country_code'=>'DK','country_enName'=>'Denmark','country_arName'=>'الدانمارك','country_enNationality'=>'Danish','country_arNationality'=>'دنماركي'
        ]);
        Country::create([
            'country_code'=>'DJ','country_enName'=>'Djibouti','country_arName'=>'جيبوتي','country_enNationality'=>'Djiboutian','country_arNationality'=>'جيبوتي'
        ]);
        Country::create([
            'country_code'=>'DM','country_enName'=>'Dominica','country_arName'=>'دومينيكا','country_enNationality'=>'Dominican','country_arNationality'=>'دومينيكي'
        ]);
        Country::create([
            'country_code'=>'DO','country_enName'=>'Dominican Republic','country_arName'=>'الجمهورية الدومينيكية','country_enNationality'=>'Dominican','country_arNationality'=>'دومينيكي'
        ]);
        Country::create([
            'country_code'=>'EC','country_enName'=>'Ecuador','country_arName'=>'إكوادور','country_enNationality'=>'Ecuadorian','country_arNationality'=>'إكوادوري'
        ]);
        Country::create([
            'country_code'=>'EG','country_enName'=>'Egypt','country_arName'=>'مصر','country_enNationality'=>'Egyptian','country_arNationality'=>'مصري'
        ]);
        Country::create([
            'country_code'=>'SV','country_enName'=>'El Salvador','country_arName'=>'إلسلفادور','country_enNationality'=>'Salvadoran','country_arNationality'=>'سلفادوري'
        ]);
        Country::create([
            'country_code'=>'GQ','country_enName'=>'Equatorial Guinea','country_arName'=>'غينيا الاستوائي','country_enNationality'=>'Equatorial Guinean','country_arNationality'=>'غيني'
        ]);
        Country::create([
            'country_code'=>'ER','country_enName'=>'Eritrea','country_arName'=>'إريتريا','country_enNationality'=>'Eritrean','country_arNationality'=>'إريتيري'
        ]);
        Country::create([
            'country_code'=>'EE','country_enName'=>'Estonia','country_arName'=>'استونيا','country_enNationality'=>'Estonian','country_arNationality'=>'استوني'
        ]);
        Country::create([
            'country_code'=>'ET','country_enName'=>'Ethiopia','country_arName'=>'أثيوبيا','country_enNationality'=>'Ethiopian','country_arNationality'=>'أثيوبي'
        ]);
        Country::create([
            'country_code'=>'FK','country_enName'=>'Falkland Islands (Malvinas)','country_arName'=>'جزر فوكلاند','country_enNationality'=>'Falkland Islander','country_arNationality'=>'فوكلاندي'
        ]);
//        Country::create([
//            'country_code'=>'ER','country_enName'=>'Eritrea','country_arName'=>'إريتريا','country_enNationality'=>'Eritrean','country_arNationality'=>'إريتيري'
//        ]);
        Country::create([
            'country_code'=>'FO','country_enName'=>'Faroe Islands','country_arName'=>'جزر فارو','country_enNationality'=>'Faroese','country_arNationality'=>'جزر فارو'
        ]);
        Country::create([
            'country_code'=>'FJ','country_enName'=>'Fiji','country_arName'=>'فيجي','country_enNationality'=>'Fijian','country_arNationality'=>'فيجي'
        ]);
        Country::create([
            'country_code'=>'FI','country_enName'=>'Finland','country_arName'=>'فنلندا','country_enNationality'=>'Finnish','country_arNationality'=>'فنلندي'
        ]);
        Country::create([
            'country_code'=>'FR','country_enName'=>'France','country_arName'=>'فرنسا','country_enNationality'=>'French','country_arNationality'=>'فرنسي'
        ]);
        Country::create([
            'country_code'=>'GF','country_enName'=>'French Guiana','country_arName'=>'غويانا الفرنسية','country_enNationality'=>'French Guianese','country_arNationality'=>'غويانا الفرنسية'
        ]);
        Country::create([
            'country_code'=>'PF','country_enName'=>'French Polynesia','country_arName'=>'بولينيزيا الفرنسية','country_enNationality'=>'French Polynesian','country_arNationality'=>'بولينيزيي'
        ]);
        Country::create([
            'country_code'=>'TF','country_enName'=>'French Southern and Antarctic Lands','country_arName'=>'أراض فرنسية جنوبية وأنتارتيكية','country_enNationality'=>'French','country_arNationality'=>'أراض فرنسية جنوبية وأنتارتيكية'
        ]);
        Country::create([
            'country_code'=>'GA','country_enName'=>'Gabon','country_arName'=>'الغابون','country_enNationality'=>'Gabonese','country_arNationality'=>'غابوني'
        ]);
        Country::create([
            'country_code'=>'GM','country_enName'=>'Gambia','country_arName'=>'غامبيا','country_enNationality'=>'Gambian','country_arNationality'=>'غامبي'
        ]);
        Country::create([
            'country_code'=>'GE','country_enName'=>'Georgia','country_arName'=>'جيورجيا','country_enNationality'=>'Georgian','country_arNationality'=>'جيورجي'
        ]);
        Country::create([
            'country_code'=>'DE','country_enName'=>'Germany','country_arName'=>'ألمانيا','country_enNationality'=>'German','country_arNationality'=>'ألماني'
        ]);
        Country::create([
            'country_code'=>'GH','country_enName'=>'Ghana','country_arName'=>'غانا','country_enNationality'=>'Ghanaian','country_arNationality'=>'غاني'
        ]);
        Country::create([
            'country_code'=>'GI','country_enName'=>'Gibraltar','country_arName'=>'جبل طارق','country_enNationality'=>'Gibraltar','country_arNationality'=>'جبل طارق'
        ]);
        Country::create([
            'country_code'=>'GG','country_enName'=>'Guernsey','country_arName'=>'غيرنزي','country_enNationality'=>'Guernsian','country_arNationality'=>'غيرنزي'
        ]);
        Country::create([
            'country_code'=>'GR','country_enName'=>'Greece','country_arName'=>'اليونان','country_enNationality'=>'Greek','country_arNationality'=>'يوناني'
        ]);
        Country::create([
            'country_code'=>'GL','country_enName'=>'Greenland','country_arName'=>'جرينلاند','country_enNationality'=>'Greenlandic','country_arNationality'=>'جرينلاندي'
        ]);
        Country::create([
            'country_code'=>'GD','country_enName'=>'Grenada','country_arName'=>'غرينادا','country_enNationality'=>'Grenadian','country_arNationality'=>'غرينادي'
        ]);
        Country::create([
            'country_code'=>'GP','country_enName'=>'Guadeloupe','country_arName'=>'جزر جوادلوب','country_enNationality'=>'Guadeloupe','country_arNationality'=>'جزر جوادلوب'
        ]);
        Country::create([
            'country_code'=>'GU','country_enName'=>'Guam','country_arName'=>'جوام','country_enNationality'=>'Guamanian','country_arNationality'=>'جوامي'
        ]);
        Country::create([
            'country_code'=>'GT','country_enName'=>'Guatemala','country_arName'=>'غواتيمال','country_enNationality'=>'Guatemalan','country_arNationality'=>'غواتيمالي'
        ]);
        Country::create([
            'country_code'=>'GN','country_enName'=>'Guinea','country_arName'=>'غينيا','country_enNationality'=>'Guinean','country_arNationality'=>'غيني'
        ]);
        Country::create([
            'country_code'=>'GW','country_enName'=>'Guinea-Bissau','country_arName'=>'غينيا-بيساو','country_enNationality'=>'Guinea-Bissauan','country_arNationality'=>'غيني'
        ]);
        Country::create([
            'country_code'=>'GY','country_enName'=>'Guyana','country_arName'=>'غيانا','country_enNationality'=>'Guyanese','country_arNationality'=>'غياني'
        ]);
        Country::create([
            'country_code'=>'HT','country_enName'=>'Haiti','country_arName'=>'هايتي','country_enNationality'=>'Haitian','country_arNationality'=>'هايتي'
        ]);
        Country::create([
            'country_code'=>'HM','country_enName'=>'Heard and Mc Donald Islands','country_arName'=>'جزيرة هيرد وجزر ماكدونالد','country_enNationality'=>'Heard and Mc Donald Islanders','country_arNationality'=>'جزيرة هيرد وجزر ماكدونالد'
        ]);
        Country::create([
            'country_code'=>'HN','country_enName'=>'Honduras','country_arName'=>'هندوراس','country_enNationality'=>'Honduran','country_arNationality'=>'هندوراسي'
        ]);
        Country::create([
            'country_code'=>'HK','country_enName'=>'Hong Kong','country_arName'=>'هونغ كونغ','country_enNationality'=>'Hongkongese','country_arNationality'=>'هونغ كونغي'
        ]);
        Country::create([
            'country_code'=>'HU','country_enName'=>'Hungary','country_arName'=>'المجر','country_enNationality'=>'Hungarian','country_arNationality'=>'مجري'
        ]);
        Country::create([
            'country_code'=>'IS','country_enName'=>'Iceland','country_arName'=>'آيسلندا','country_enNationality'=>'Icelandic','country_arNationality'=>'آيسلندي'
        ]);
        Country::create([
            'country_code'=>'IN','country_enName'=>'India','country_arName'=>'الهند','country_enNationality'=>'Indian','country_arNationality'=>'هندي'
        ]);
        Country::create([
            'country_code'=>'IM','country_enName'=>'Isle of Man','country_arName'=>'جزيرة مان','country_enNationality'=>'Manx','country_arNationality'=>'ماني'
        ]);
        Country::create([
            'country_code'=>'ID','country_enName'=>'Indonesia','country_arName'=>'أندونيسيا','country_enNationality'=>'Indonesian','country_arNationality'=>'أندونيسيي'
        ]);
        Country::create([
            'country_code'=>'IR','country_enName'=>'Iran','country_arName'=>'إيران','country_enNationality'=>'Iranian','country_arNationality'=>'إيراني'
        ]);
        Country::create([
            'country_code'=>'IQ','country_enName'=>'Iraq','country_arName'=>'العراق','country_enNationality'=>'Iraqi','country_arNationality'=>'عراقي'
        ]);
        Country::create([
            'country_code'=>'IE','country_enName'=>'Ireland','country_arName'=>'إيرلندا','country_enNationality'=>'Irish','country_arNationality'=>'إيرلندي'
        ]);
        Country::create([
            'country_code'=>'IL','country_enName'=>'Israel','country_arName'=>'إسرائيل','country_enNationality'=>'Israeli','country_arNationality'=>'إسرائيلي'
        ]);
        Country::create([
            'country_code'=>'IT','country_enName'=>'Italy','country_arName'=>'إيطاليا','country_enNationality'=>'Italian','country_arNationality'=>'إيطالي'
        ]);
        Country::create([
            'country_code'=>'CI','country_enName'=>'Ivory Coast','country_arName'=>'ساحل العاج','country_enNationality'=>'Ivory Coastian','country_arNationality'=>'ساحل العاج'
        ]);
        Country::create([
            'country_code'=>'JE','country_enName'=>'Jersey','country_arName'=>'جيرزي','country_enNationality'=>'Jersian','country_arNationality'=>'جيرزي'
        ]);
        Country::create([
            'country_code'=>'JM','country_enName'=>'Jamaica','country_arName'=>'جمايكا','country_enNationality'=>'Jamaican','country_arNationality'=>'جمايكي'
        ]);
        Country::create([
            'country_code'=>'JP','country_enName'=>'Japan','country_arName'=>'اليابان','country_enNationality'=>'Japanese','country_arNationality'=>'ياباني'
        ]);
        Country::create([
            'country_code'=>'JO','country_enName'=>'Jordan','country_arName'=>'الأردن','country_enNationality'=>'Jordanian','country_arNationality'=>'أردني'
        ]);
        Country::create([
            'country_code'=>'KZ','country_enName'=>'Kazakhstan','country_arName'=>'كازاخستان','country_enNationality'=>'Kazakh','country_arNationality'=>'كازاخستاني'
        ]);
        Country::create([
            'country_code'=>'KE','country_enName'=>'Kenya','country_arName'=>'كينيا','country_enNationality'=>'Kenyan','country_arNationality'=>'كيني'
        ]);
        Country::create([
            'country_code'=>'KI','country_enName'=>'Kiribati','country_arName'=>'كيريباتي','country_enNationality'=>'I-Kiribati','country_arNationality'=>'كيريباتي'
        ]);
        Country::create([
            'country_code'=>'KP','country_enName'=>'Korea(North Korea)','country_arName'=>'كوريا الشمالية','country_enNationality'=>'North Korean','country_arNationality'=>'كوري'
        ]);
        Country::create([
            'country_code'=>'KR','country_enName'=>'Korea(South Korea)','country_arName'=>'كوريا الجنوبية','country_enNationality'=>'South Korean','country_arNationality'=>'كوري'
        ]);
        Country::create([
            'country_code'=>'XK','country_enName'=>'Kosovo','country_arName'=>'كوسوفو','country_enNationality'=>'Kosovar','country_arNationality'=>'كوسيفي'
        ]);
        Country::create([
            'country_code'=>'KW','country_enName'=>'Kuwait','country_arName'=>'الكويت','country_enNationality'=>'Kuwaiti','country_arNationality'=>'كويتي'
        ]);
        Country::create([
            'country_code'=>'KG','country_enName'=>'Kyrgyzstan','country_arName'=>'قيرغيزستان','country_enNationality'=>'Kyrgyzstani','country_arNationality'=>'قيرغيزستاني'
        ]);
        Country::create([
            'country_code'=>'LA','country_enName'=>'Lao PDR','country_arName'=>'لاوس','country_enNationality'=>'Laotian','country_arNationality'=>'لاوسي'
        ]);
        Country::create([
            'country_code'=>'LV','country_enName'=>'Latvia','country_arName'=>'لاتفيا','country_enNationality'=>'Latvian','country_arNationality'=>'لاتيفي'
        ]);
        Country::create([
            'country_code'=>'LB','country_enName'=>'Lebanon','country_arName'=>'لبنان','country_enNationality'=>'Lebanese','country_arNationality'=>'لبناني'
        ]);
        Country::create([
            'country_code'=>'LS','country_enName'=>'Lesotho','country_arName'=>'ليسوتو','country_enNationality'=>'Basotho','country_arNationality'=>'ليوسيتي'
        ]);
        Country::create([
            'country_code'=>'LR','country_enName'=>'Liberia','country_arName'=>'ليبيريا','country_enNationality'=>'Liberian','country_arNationality'=>'ليبيري'
        ]);
        Country::create([
            'country_code'=>'LY','country_enName'=>'Libya','country_arName'=>'ليبيا','country_enNationality'=>'Libyan','country_arNationality'=>'ليبي'
        ]);
        Country::create([
            'country_code'=>'LI','country_enName'=>'Liechtenstein','country_arName'=>'ليختنشتين','country_enNationality'=>'Liechtenstein','country_arNationality'=>'ليختنشتيني'
        ]);
        Country::create([
            'country_code'=>'LT','country_enName'=>'Lithuania','country_arName'=>'لتوانيا','country_enNationality'=>'Lithuanian','country_arNationality'=>'لتوانيي'
        ]);
        Country::create([
            'country_code'=>'LU','country_enName'=>'Luxembourg','country_arName'=>'لوكسمبورغ','country_enNationality'=>'Luxembourger','country_arNationality'=>'لوكسمبورغي'
        ]);
        Country::create([
            'country_code'=>'LK','country_enName'=>'Sri Lanka','country_arName'=>'سريلانكا','country_enNationality'=>'Sri Lankian','country_arNationality'=>'سريلانكي'
        ]);
        Country::create([
            'country_code'=>'MO','country_enName'=>'Macau','country_arName'=>'ماكاو','country_enNationality'=>'Macanese','country_arNationality'=>'ماكاوي'
        ]);
        Country::create([
            'country_code'=>'MK','country_enName'=>'Macedonia','country_arName'=>'مقدونيا','country_enNationality'=>'Macedonian','country_arNationality'=>'مقدوني'
        ]);
        Country::create([
            'country_code'=>'MG','country_enName'=>'Madagascar','country_arName'=>'مدغشقر','country_enNationality'=>'Malagasy','country_arNationality'=>'مدغشقري'
        ]);
        Country::create([
            'country_code'=>'MW','country_enName'=>'Malawi','country_arName'=>'مالاوي','country_enNationality'=>'Malawian','country_arNationality'=>'مالاوي'
        ]);
        Country::create([
            'country_code'=>'MY','country_enName'=>'Malaysia','country_arName'=>'ماليزيا','country_enNationality'=>'Malaysian','country_arNationality'=>'ماليزي'
        ]);
        Country::create([
            'country_code'=>'MV','country_enName'=>'Maldives','country_arName'=>'المالديف','country_enNationality'=>'Maldivian','country_arNationality'=>'مالديفي'
        ]);
        Country::create([
            'country_code'=>'ML','country_enName'=>'Mali','country_arName'=>'مالي','country_enNationality'=>'Malian','country_arNationality'=>'مالي'
        ]);
        Country::create([
            'country_code'=>'MT','country_enName'=>'Malta','country_arName'=>'مالطا','country_enNationality'=>'Maltese','country_arNationality'=>'مالطي'
        ]);
        Country::create([
            'country_code'=>'MH','country_enName'=>'Marshall Islands','country_arName'=>'جزر مارشال','country_enNationality'=>'Marshallese','country_arNationality'=>'مارشالي'
        ]);
        Country::create([
            'country_code'=>'MQ','country_enName'=>'Martinique','country_arName'=>'مارتينيك','country_enNationality'=>'Martiniquais','country_arNationality'=>'مارتينيكي'
        ]);
        Country::create([
            'country_code'=>'MR','country_enName'=>'Mauritania','country_arName'=>'موريتانيا','country_enNationality'=>'Mauritanian','country_arNationality'=>'موريتانيي'
        ]);
        Country::create([
            'country_code'=>'MU','country_enName'=>'Mauritius','country_arName'=>'موريشيوس','country_enNationality'=>'Mauritian','country_arNationality'=>'موريشيوسي'
        ]);
        Country::create([
            'country_code'=>'YT','country_enName'=>'Mayotte','country_arName'=>'مايوت','country_enNationality'=>'Mahoran','country_arNationality'=>'مايوتي'
        ]);
        Country::create([
            'country_code'=>'MX','country_enName'=>'Mexico','country_arName'=>'المكسيك','country_enNationality'=>'Mexican','country_arNationality'=>'مكسيكي'
        ]);
        Country::create([
            'country_code'=>'FM','country_enName'=>'Micronesia','country_arName'=>'مايكرونيزيا','country_enNationality'=>'Micronesian','country_arNationality'=>'مايكرونيزيي'
        ]);
        Country::create([
            'country_code'=>'MD','country_enName'=>'Moldova','country_arName'=>'مولدافيا','country_enNationality'=>'Moldovan','country_arNationality'=>'مولديفي'
        ]);
        Country::create([
            'country_code'=>'MC','country_enName'=>'Monaco','country_arName'=>'موناكو','country_enNationality'=>'Monacan','country_arNationality'=>'مونيكي'
        ]);
        Country::create([
            'country_code'=>'MN','country_enName'=>'Mongolia','country_arName'=>'منغوليا','country_enNationality'=>'Mongolian','country_arNationality'=>'منغولي'
        ]);
        Country::create([
            'country_code'=>'ME','country_enName'=>'Montenegro','country_arName'=>'الجبل الأسود','country_enNationality'=>'Montenegrin','country_arNationality'=>'الجبل الأسود'
        ]);
        Country::create([
            'country_code'=>'MS','country_enName'=>'Montserrat','country_arName'=>'مونتسيرات','country_enNationality'=>'Montserratian','country_arNationality'=>'مونتسيراتي'
        ]);
        Country::create([
            'country_code'=>'MA','country_enName'=>'Morocco','country_arName'=>'المغرب','country_enNationality'=>'Moroccan','country_arNationality'=>'مغربي'
        ]);
        Country::create([
            'country_code'=>'MZ','country_enName'=>'Mozambique','country_arName'=>'موزمبيق','country_enNationality'=>'Mozambican','country_arNationality'=>'موزمبيقي'
        ]);
        Country::create([
            'country_code'=>'MM','country_enName'=>'Myanmar','country_arName'=>'ميانمار','country_enNationality'=>'Myanmarian','country_arNationality'=>'ميانماري'
        ]);
        Country::create([
            'country_code'=>'NA','country_enName'=>'Namibia','country_arName'=>'ناميبيا','country_enNationality'=>'Namibian','country_arNationality'=>'ناميبي'
        ]);
        Country::create([
            'country_code'=>'NR','country_enName'=>'Nauru','country_arName'=>'نورو','country_enNationality'=>'Nauruan','country_arNationality'=>'نوري'
        ]);
        Country::create([
            'country_code'=>'NP','country_enName'=>'Nepal','country_arName'=>'نيبال','country_enNationality'=>'Nepalese','country_arNationality'=>'نيبالي'
        ]);
        Country::create([
            'country_code'=>'NL','country_enName'=>'Netherlands','country_arName'=>'هولندا','country_enNationality'=>'Dutch','country_arNationality'=>'هولندي'
        ]);
        Country::create([
            'country_code'=>'AN','country_enName'=>'Netherlands Antilles','country_arName'=>'جزر الأنتيل الهولندي','country_enNationality'=>'Dutch Antilier','country_arNationality'=>'هولندي'
        ]);
        Country::create([
            'country_code'=>'NC','country_enName'=>'New Caledonia','country_arName'=>'كاليدونيا الجديدة','country_enNationality'=>'New Caledonian','country_arNationality'=>'كاليدوني'
        ]);
        Country::create([
            'country_code'=>'NZ','country_enName'=>'New Zealand','country_arName'=>'نيوزيلندا','country_enNationality'=>'New Zealander','country_arNationality'=>'نيوزيلندي'
        ]);
        Country::create([
            'country_code'=>'NI','country_enName'=>'Nicaragua','country_arName'=>'نيكاراجوا','country_enNationality'=>'Nicaraguan','country_arNationality'=>'نيكاراجوي'
        ]);
        Country::create([
            'country_code'=>'NE','country_enName'=>'Niger','country_arName'=>'النيجر','country_enNationality'=>'Nigerien','country_arNationality'=>'نيجيري'
        ]);
        Country::create([
            'country_code'=>'NG','country_enName'=>'Nigeria','country_arName'=>'نيجيريا','country_enNationality'=>'Nigerian','country_arNationality'=>'نيجيري'
        ]);
        Country::create([
            'country_code'=>'NU','country_enName'=>'Niue','country_arName'=>'ني','country_enNationality'=>'Niuean','country_arNationality'=>'ني'
        ]);
        Country::create([
            'country_code'=>'NF','country_enName'=>'Norfolk Island','country_arName'=>'جزيرة نورفولك','country_enNationality'=>'Norfolk Islander','country_arNationality'=>'نورفوليكي'
        ]);
        Country::create([
            'country_code'=>'MP','country_enName'=>'Northern Mariana Islands','country_arName'=>'جزر ماريانا الشمالية','country_enNationality'=>'Northern Marianan','country_arNationality'=>'ماريني'
        ]);
//        Country::create([
//            'country_code'=>'NG','country_enName'=>'Nigeria','country_arName'=>'نيجيريا','country_enNationality'=>'Nigerian','country_arNationality'=>'نيجيري'
//        ]);
        Country::create([
            'country_code'=>'NO','country_enName'=>'Norway','country_arName'=>'النرويج','country_enNationality'=>'Norwegian','country_arNationality'=>'نرويجي'
        ]);
        Country::create([
            'country_code'=>'OM','country_enName'=>'Oman','country_arName'=>'عمان','country_enNationality'=>'Omani','country_arNationality'=>'عماني'
        ]);
        Country::create([
            'country_code'=>'PK','country_enName'=>'Pakistan','country_arName'=>'باكستان','country_enNationality'=>'Pakistani','country_arNationality'=>'باكستاني'
        ]);
        Country::create([
            'country_code'=>'PW','country_enName'=>'Palau','country_arName'=>'بالاو','country_enNationality'=>'Palauan','country_arNationality'=>'بالاوي'
        ]);
        Country::create([
            'country_code'=>'PS','country_enName'=>'Palestine','country_arName'=>'فلسطين','country_enNationality'=>'Palestinian','country_arNationality'=>'فلسطيني'
        ]);
        Country::create([
            'country_code'=>'PA','country_enName'=>'Panama','country_arName'=>'بنما','country_enNationality'=>'Panamanian','country_arNationality'=>'بنمي'
        ]);
        Country::create([
            'country_code'=>'PG','country_enName'=>'Papua New Guinea','country_arName'=>'بابوا غينيا الجديدة','country_enNationality'=>'Papua New Guinean','country_arNationality'=>'بابوي'
        ]);
        Country::create([
            'country_code'=>'PY','country_enName'=>'Paraguay','country_arName'=>'باراغواي','country_enNationality'=>'Paraguayan','country_arNationality'=>'بارغاوي'
        ]);
        Country::create([
            'country_code'=>'PE','country_enName'=>'Peru','country_arName'=>'بيرو','country_enNationality'=>'Peruvian','country_arNationality'=>'بيري'
        ]);
        Country::create([
            'country_code'=>'PH','country_enName'=>'Philippines','country_arName'=>'الفليبين','country_enNationality'=>'Filipino','country_arNationality'=>'فلبيني'
        ]);
        Country::create([
            'country_code'=>'PN','country_enName'=>'Pitcairn','country_arName'=>'بيتكيرن','country_enNationality'=>'Pitcairn Islander','country_arNationality'=>'بيتكيرني'
        ]);
        Country::create([
            'country_code'=>'PL','country_enName'=>'Poland','country_arName'=>'بولندا','country_enNationality'=>'Polish','country_arNationality'=>'بولندي'
        ]);
        Country::create([
            'country_code'=>'PT','country_enName'=>'Portugal','country_arName'=>'البرتغال','country_enNationality'=>'Portuguese','country_arNationality'=>'برتغالي'
        ]);
        Country::create([
            'country_code'=>'PR','country_enName'=>'Puerto Rico','country_arName'=>'بورتو ريكو','country_enNationality'=>'Puerto Rican','country_arNationality'=>'بورتي'
        ]);
        Country::create([
            'country_code'=>'QA','country_enName'=>'Qatar','country_arName'=>'قطر','country_enNationality'=>'Qatari','country_arNationality'=>'قطري'
        ]);
        Country::create([
            'country_code'=>'RE','country_enName'=>'Reunion Island','country_arName'=>'ريونيون','country_enNationality'=>'Reunionese','country_arNationality'=>'ريونيوني'
        ]);
        Country::create([
            'country_code'=>'RO','country_enName'=>'Romania','country_arName'=>'رومانيا','country_enNationality'=>'Romanian','country_arNationality'=>'روماني'
        ]);
        Country::create([
            'country_code'=>'RU','country_enName'=>'Russian','country_arName'=>'روسيا','country_enNationality'=>'Russian','country_arNationality'=>'روسي'
        ]);
        Country::create([
            'country_code'=>'RW','country_enName'=>'Rwanda','country_arName'=>'رواندا','country_enNationality'=>'Rwandan','country_arNationality'=>'رواندا'
        ]);
        Country::create([
            'country_code'=>'KN','country_enName'=>'Saint Kitts and Nevis','country_arName'=>'سانت كيتس ونيفس,','country_enNationality'=>'Kittitian\/Nevisian','country_arNationality'=>'سانت كيتس ونيفس'
        ]);
        Country::create([
            'country_code'=>'MF','country_enName'=>'Saint Martin (French part)','country_arName'=>'ساينت مارتن فرنسي','country_enNationality'=>'St. Martian(French)','country_arNationality'=>'ساينت مارتني فرنسي'
        ]);
        Country::create([
            'country_code'=>'SX','country_enName'=>'Sint Maarten (Dutch part)','country_arName'=>'ساينت مارتن هولندي','country_enNationality'=>'St. Martian(Dutch)','country_arNationality'=>'ساينت مارتني هولندي'
        ]);
        Country::create([
            'country_code'=>'LC','country_enName'=>'Saint Pierre and Miquelon','country_arName'=>'سان بيير وميكلون','country_enNationality'=>'St. Pierre and Miquelon','country_arNationality'=>'سان بيير وميكلوني'
        ]);
        Country::create([
            'country_code'=>'VC','country_enName'=>'Saint Vincent and the Grenadines','country_arName'=>'سانت فنسنت وجزر غرينادين','country_enNationality'=>'Saint Vincent and the Grenadines','country_arNationality'=>'سانت فنسنت وجزر غرينادين'
        ]);
        Country::create([
            'country_code'=>'WS','country_enName'=>'Samoa','country_arName'=>'ساموا','country_enNationality'=>'Samoan','country_arNationality'=>'ساموي'
        ]);
        Country::create([
            'country_code'=>'SM','country_enName'=>'San Marino','country_arName'=>'سان مارينو','country_enNationality'=>'Sammarinese','country_arNationality'=>'ماريني'
        ]);
        Country::create([
            'country_code'=>'ST','country_enName'=>'Sao Tome and Principe','country_arName'=>'ساو تومي وبرينسيبي','country_enNationality'=>'Sao Tomean','country_arNationality'=>'ساو تومي وبرينسيبي'
        ]);
        Country::create([
            'country_code'=>'SA','country_enName'=>'Saudi Arabia','country_arName'=>'المملكة العربية السعودية','country_enNationality'=>'Saudi Arabian','country_arNationality'=>'سعودي'
        ]);
        Country::create([
            'country_code'=>'SN','country_enName'=>'Senegal','country_arName'=>'السنغال','country_enNationality'=>'Senegalese','country_arNationality'=>'سنغالي'
        ]);
        Country::create([
            'country_code'=>'RS','country_enName'=>'Serbia','country_arName'=>'صربيا','country_enNationality'=>'Serbian','country_arNationality'=>'صربي'
        ]);
        Country::create([
            'country_code'=>'SC','country_enName'=>'Seychelles','country_arName'=>'سيشيل','country_enNationality'=>'Seychellois','country_arNationality'=>'سيشيلي'
        ]);
        Country::create([
            'country_code'=>'SL','country_enName'=>'Sierra Leone','country_arName'=>'سيراليون','country_enNationality'=>'Sierra Leonean','country_arNationality'=>'سيراليوني'
        ]);
        Country::create([
            'country_code'=>'SG','country_enName'=>'Singapore','country_arName'=>'سنغافورة','country_enNationality'=>'Singaporean','country_arNationality'=>'سنغافوري'
        ]);
        Country::create([
            'country_code'=>'SK','country_enName'=>'Slovakia','country_arName'=>'سلوفاكيا','country_enNationality'=>'Slovak','country_arNationality'=>'سولفاكي'
        ]);
        Country::create([
            'country_code'=>'SI','country_enName'=>'Slovenia','country_arName'=>'سلوفينيا','country_enNationality'=>'Slovenian','country_arNationality'=>'سولفيني'
        ]);
        Country::create([
            'country_code'=>'SB','country_enName'=>'Solomon Islands','country_arName'=>'جزر سليمان','country_enNationality'=>'Solomon Island','country_arNationality'=>'جزر سليمان'
        ]);
        Country::create([
            'country_code'=>'SO','country_enName'=>'Somalia','country_arName'=>'الصومال','country_enNationality'=>'Somali','country_arNationality'=>'صومالي'
        ]);
        Country::create([
            'country_code'=>'ZA','country_enName'=>'South Africa','country_arName'=>'جنوب أفريقيا','country_enNationality'=>'South African','country_arNationality'=>'أفريقي'
        ]);
        Country::create([
            'country_code'=>'GS','country_enName'=>'South Georgia and the South Sandwich','country_arName'=>'المنطقة القطبية الجنوبية','country_enNationality'=>'South Georgia and the South Sandwich','country_arNationality'=>'لمنطقة القطبية الجنوبية'
        ]);
        Country::create([
            'country_code'=>'SS','country_enName'=>'South Sudan','country_arName'=>'السودان الجنوبي','country_enNationality'=>'South Sudanese','country_arNationality'=>'سوادني جنوبي'
        ]);
        Country::create([
            'country_code'=>'ES','country_enName'=>'Spain','country_arName'=>'إسبانيا','country_enNationality'=>'Spanish','country_arNationality'=>'إسباني'
        ]);
        Country::create([
            'country_code'=>'SH','country_enName'=>'Saint Helena','country_arName'=>'سانت هيلانة','country_enNationality'=>'St. Helenian','country_arNationality'=>'هيلاني'
        ]);
        Country::create([
            'country_code'=>'SD','country_enName'=>'Sudan','country_arName'=>'السودان','country_enNationality'=>'Sudanese','country_arNationality'=>'سوداني'
        ]);
        Country::create([
            'country_code'=>'SR','country_enName'=>'Suriname','country_arName'=>'سورينام','country_enNationality'=>'Surinamese','country_arNationality'=>'سورينامي'
        ]);
        Country::create([
            'country_code'=>'SJ','country_enName'=>'Svalbard and Jan Mayen','country_arName'=>'سفالبارد ويان ماين','country_enNationality'=>'Svalbardian\/Jan Mayenian','country_arNationality'=>'سفالبارد ويان ماين'
        ]);
        Country::create([
            'country_code'=>'SZ','country_enName'=>'Swaziland','country_arName'=>'سوازيلند','country_enNationality'=>'Swazi','country_arNationality'=>'سوازيلندي'
        ]);
        Country::create([
            'country_code'=>'SE','country_enName'=>'Sweden','country_arName'=>'السويد','country_enNationality'=>'Swedish','country_arNationality'=>'سويدي'
        ]);
        Country::create([
            'country_code'=>'CH','country_enName'=>'Switzerland','country_arName'=>'سويسرا','country_enNationality'=>'Swiss','country_arNationality'=>'سويسري'
        ]);
        Country::create([
            'country_code'=>'SY','country_enName'=>'Syria','country_arName'=>'سوريا','country_enNationality'=>'Syrian','country_arNationality'=>'سوري'
        ]);
        Country::create([
            'country_code'=>'TW','country_enName'=>'Taiwan','country_arName'=>'تايوان','country_enNationality'=>'Taiwanese','country_arNationality'=>'تايواني'
        ]);
        Country::create([
            'country_code'=>'TJ','country_enName'=>'Tajikistan','country_arName'=>'طاجيكستان','country_enNationality'=>'Tajikistani','country_arNationality'=>'طاجيكستاني'
        ]);
        Country::create([
            'country_code'=>'TZ','country_enName'=>'Tanzania','country_arName'=>'تنزانيا','country_enNationality'=>'Tanzanian','country_arNationality'=>'تنزانيي'
        ]);
        Country::create([
            'country_code'=>'TH','country_enName'=>'Thailand','country_arName'=>'تايلندا','country_enNationality'=>'Thai','country_arNationality'=>'تايلندي'
        ]);
        Country::create([
            'country_code'=>'TL','country_enName'=>'Timor-Leste','country_arName'=>'تيمور الشرقية','country_enNationality'=>'Timor-Lestian','country_arNationality'=>'تيموري'
        ]);
        Country::create([
            'country_code'=>'TG','country_enName'=>'Togo','country_arName'=>'توغو','country_enNationality'=>'Togolese','country_arNationality'=>'توغي'
        ]);
        Country::create([
            'country_code'=>'TK','country_enName'=>'Tokelau','country_arName'=>'توكيلاو','country_enNationality'=>'Tokelaian','country_arNationality'=>'توكيلاوي'
        ]);
        Country::create([
            'country_code'=>'TO','country_enName'=>'Tonga','country_arName'=>'تونغا','country_enNationality'=>'Tongan','country_arNationality'=>'تونغي'
        ]);
        Country::create([
            'country_code'=>'TT','country_enName'=>'Trinidad and Tobago','country_arName'=>'ترينيداد وتوباغو','country_enNationality'=>'Trinidadian\/Tobagonian','country_arNationality'=>'ترينيداد وتوباغو'
        ]);
        Country::create([
            'country_code'=>'TN','country_enName'=>'Tunisia','country_arName'=>'تونس','country_enNationality'=>'Tunisian','country_arNationality'=>'تونسي'
        ]);
        Country::create([
            'country_code'=>'TR','country_enName'=>'Turkey','country_arName'=>'تركيا','country_enNationality'=>'Turkish','country_arNationality'=>'تركي'
        ]);
        Country::create([
            'country_code'=>'TM','country_enName'=>'Turkmenistan','country_arName'=>'تركمانستان','country_enNationality'=>'Turkmen','country_arNationality'=>'تركمانستاني'
        ]);
        Country::create([
            'country_code'=>'TC','country_enName'=>'Turks and Caicos Islands','country_arName'=>'جزر توركس وكايكوس','country_enNationality'=>'Turks and Caicos Islands','country_arNationality'=>'جزر توركس وكايكوس'
        ]);
        Country::create([
            'country_code'=>'TV','country_enName'=>'Tuvalu','country_arName'=>'توفالو','country_enNationality'=>'Tuvaluan','country_arNationality'=>'توفالي'
        ]);
        Country::create([
            'country_code'=>'UG','country_enName'=>'Uganda','country_arName'=>'أوغندا','country_enNationality'=>'Ugandan','country_arNationality'=>'أوغندي'
        ]);
        Country::create([
            'country_code'=>'UA','country_enName'=>'Ukraine','country_arName'=>'أوكرانيا','country_enNationality'=>'Ukrainian','country_arNationality'=>'أوكراني'
        ]);
        Country::create([
            'country_code'=>'AE','country_enName'=>'United Arab Emirates','country_arName'=>'الإمارات العربية المتحدة','country_enNationality'=>'Emirati','country_arNationality'=>'إماراتي'
        ]);
        Country::create([
            'country_code'=>'GB','country_enName'=>'United Kingdom','country_arName'=>'المملكة المتحدة','country_enNationality'=>'British','country_arNationality'=>'بريطاني'
        ]);
        Country::create([
            'country_code'=>'US','country_enName'=>'United States','country_arName'=>'الولايات المتحدة','country_enNationality'=>'American','country_arNationality'=>'أمريكي'
        ]);
        Country::create([
            'country_code'=>'UM','country_enName'=>'US Minor Outlying Islands','country_arName'=>'قائمة الولايات والمناطق الأمريكية','country_enNationality'=>'US Minor Outlying Islander','country_arNationality'=>'أمريكي'
        ]);
        Country::create([
            'country_code'=>'UY','country_enName'=>'Uruguay','country_arName'=>'أورغواي','country_enNationality'=>'Uruguayan','country_arNationality'=>'أورغواي'
        ]);
        Country::create([
            'country_code'=>'UZ','country_enName'=>'Uzbekistan','country_arName'=>'أوزباكستان','country_enNationality'=>'Uzbek','country_arNationality'=>'أوزباكستاني'
        ]);
        Country::create([
            'country_code'=>'VU','country_enName'=>'Vanuatu','country_arName'=>'فانواتو','country_enNationality'=>'Vanuatuan','country_arNationality'=>'فانواتي'
        ]);
        Country::create([
            'country_code'=>'VE','country_enName'=>'Venezuela','country_arName'=>'فنزويلا','country_enNationality'=>'Venezuelan','country_arNationality'=>'فنزويلي'
        ]);
        Country::create([
            'country_code'=>'VN','country_enName'=>'Vietnam','country_arName'=>'فيتنام','country_enNationality'=>'Vietnamese','country_arNationality'=>'فيتنامي'
        ]);
        Country::create([
            'country_code'=>'VI','country_enName'=>'Virgin Islands (U.S.)','country_arName'=>'الجزر العذراء الأمريكي','country_enNationality'=>'American Virgin Islander','country_arNationality'=>'أمريكي'
        ]);
        Country::create([
            'country_code'=>'VA','country_enName'=>'Vatican City','country_arName'=>'فنزويلا','country_enNationality'=>'Vatican','country_arNationality'=>'فاتيكاني'
        ]);
        Country::create([
            'country_code'=>'WF','country_enName'=>'Wallis and Futuna Islands','country_arName'=>'والس وفوتونا','country_enNationality'=>'Wallisian\/Futunan','country_arNationality'=>'فوتوني'
        ]);
        Country::create([
            'country_code'=>'EH','country_enName'=>'Western Sahara','country_arName'=>'الصحراء الغربية','country_enNationality'=>'Sahrawian','country_arNationality'=>'صحراوي'
        ]);
        Country::create([
            'country_code'=>'YE','country_enName'=>'Yemen','country_arName'=>'اليمن','country_enNationality'=>'Yemeni','country_arNationality'=>'يمني'
        ]);
        Country::create([
            'country_code'=>'ZM','country_enName'=>'Zambia','country_arName'=>'زامبيا','country_enNationality'=>'Zambian','country_arNationality'=>'زامبياني'
        ]);
        Country::create([
            'country_code'=>'ZW','country_enName'=>'Zimbabwe','country_arName'=>'زمبابوي','country_enNationality'=>'Zimbabwean','country_arNationality'=>'زمبابوي'
        ]);

}
}
