<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Seller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use App\Models\HomePageCategory;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Review;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class HomePageSeeder extends Seeder
{
    public function run()
    {
        // 1. Create Default Client/User for Orders & Reviews
        $user = User::firstOrCreate(
            ['email' => 'client@app.com'],
            [
                'name' => 'أحمد علي',
                'phone' => '0501234567',
                'country_id' => 1,
                'password' => Hash::make('password'),
                'image' => 'https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?w=400&q=80',
            ]
        );

        // 2. Create Realistic Sellers
        $sellersData = [
            [
                'email' => 'techworld@seller.com',
                'name' => 'TechWorld Seller',
                'phone' => '0551112233',
                'password' => 'password',
                'active' => 1,
                'shop_name_ar' => 'تيك وورلد للأجهزة الذكية',
                'shop_name_en' => 'TechWorld Electronics',
                'img_path' => 'https://images.unsplash.com/photo-1531297484001-80022131f5a1?w=400&q=80',
                'banner' => 'https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?w=1200&q=80',
                'about' => 'المتجر الأول المتخصص في تقديم أحدث الهواتف والملحقات الإلكترونية الأصلية بضمان معتمد.',
                'details' => 'Premier store for original smart devices, accessories and electronics with warranty.'
            ],
            [
                'email' => 'fashionhub@seller.com',
                'name' => 'Fashion Hub Seller',
                'phone' => '0552223344',
                'password' => 'password',
                'active' => 1,
                'shop_name_ar' => 'فاشن هوب للأزياء',
                'shop_name_en' => 'Fashion Hub',
                'img_path' => 'https://images.unsplash.com/photo-1441986300917-64674bd600d8?w=400&q=80',
                'banner' => 'https://images.unsplash.com/photo-1445205170230-053b83016050?w=1200&q=80',
                'about' => 'تشكيلات حديثة وعصرية من الأزياء والملابس اليومية والرسمية المصممة بعناية.',
                'details' => 'Trendy collections of casual and formal fashion crafted with high quality.'
            ],
            [
                'email' => 'royaloud@seller.com',
                'name' => 'Royal Oud Seller',
                'phone' => '0553334455',
                'password' => 'password',
                'active' => 1,
                'shop_name_ar' => 'متجر العود الملكي والعطور',
                'shop_name_en' => 'Royal Oud & Perfumes',
                'img_path' => 'https://images.unsplash.com/photo-1547887537-6158d64c35b3?w=400&q=80',
                'banner' => 'https://images.unsplash.com/photo-1592945403244-b3fbafd7f539?w=1200&q=80',
                'about' => 'أفخم أنواع العود والبخور والعطور الشرقية والغربية الفاخرة المستوحاة من الطبيعة.',
                'details' => 'Luxury Arabic Oud, incense and exotic perfumes inspired by nature.'
            ],
            [
                'email' => 'homeelegance@seller.com',
                'name' => 'Home Elegance Seller',
                'phone' => '0554445566',
                'password' => 'password',
                'active' => 1,
                'shop_name_ar' => 'هوم إليجانس للديكور والأثاث',
                'shop_name_en' => 'Home Elegance Furniture',
                'img_path' => 'https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?w=400&q=80',
                'banner' => 'https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?w=1200&q=80',
                'about' => 'تصاميم أثاث مودرن وديكورات منزلية راقية تضفي لمسة من الفخامة على منزلك.',
                'details' => 'Modern furniture and elegant home decor to add a touch of luxury to your living room.'
            ],
            [
                'email' => 'fitlife@seller.com',
                'name' => 'FitLife Sports Seller',
                'phone' => '0555556677',
                'password' => 'password',
                'active' => 1,
                'shop_name_ar' => 'فيت لايف للمستلزمات الرياضية',
                'shop_name_en' => 'FitLife Sports',
                'img_path' => 'https://images.unsplash.com/photo-1517838277536-f5f99be501cd?w=400&q=80',
                'banner' => 'https://images.unsplash.com/photo-1534438327276-14e5300c3a48?w=1200&q=80',
                'about' => 'كل ما تحتاجه لممارسة الرياضة والحفاظ على لياقتك البدنية من معدات وملابس رياضية.',
                'details' => 'Everything you need for fitness, gym equipment and high-grade athletic clothing.'
            ],
        ];

        $sellers = [];
        foreach ($sellersData as $sData) {
            $sellers[] = Seller::updateOrCreate(
                ['email' => $sData['email']],
                $sData
            );
        }

        // 3. Create Main Categories & Subcategories
        $categoriesData = [
            [
                'name_ar' => 'إلكترونيات وأجهزة',
                'name_en' => 'Electronics & Gadgets',
                'image' => 'https://images.unsplash.com/photo-1498049860654-af1a5c566876?w=600&q=80',
                'order' => 1,
                'rank' => 1,
                'sub' => [
                    ['name_ar' => 'هواتف ذكية', 'name_en' => 'Smartphones', 'image' => 'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?w=400&q=80'],
                    ['name_ar' => 'سماعات وصوتيات', 'name_en' => 'Audio & Headphones', 'image' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=400&q=80'],
                    ['name_ar' => 'ساعات ذكية', 'name_en' => 'Smart Watches', 'image' => 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=400&q=80'],
                ]
            ],
            [
                'name_ar' => 'أزياء وموضة',
                'name_en' => 'Fashion & Apparel',
                'image' => 'https://images.unsplash.com/photo-1445205170230-053b83016050?w=600&q=80',
                'order' => 2,
                'rank' => 2,
                'sub' => [
                    ['name_ar' => 'ملابس رجالية', 'name_en' => "Men's Clothing", 'image' => 'https://images.unsplash.com/photo-1490578474895-699bc4e2cf59?w=400&q=80'],
                    ['name_ar' => 'ملابس نسائية', 'name_en' => "Women's Clothing", 'image' => 'https://images.unsplash.com/photo-1525507119028-ed4c629a60a3?w=400&q=80'],
                ]
            ],
            [
                'name_ar' => 'العطور والجمال',
                'name_en' => 'Beauty & Perfumes',
                'image' => 'https://images.unsplash.com/photo-1522337360788-8b13dee7a37e?w=600&q=80',
                'order' => 3,
                'rank' => 3,
                'sub' => [
                    ['name_ar' => 'عطور فاخرة', 'name_en' => 'Luxury Perfumes', 'image' => 'https://images.unsplash.com/photo-1547887537-6158d64c35b3?w=400&q=80'],
                    ['name_ar' => 'العناية بالبشرة', 'name_en' => 'Skincare', 'image' => 'https://images.unsplash.com/photo-1556228720-195a672e8a03?w=400&q=80'],
                ]
            ],
            [
                'name_ar' => 'أثاث وديكور',
                'name_en' => 'Home & Furniture',
                'image' => 'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=600&q=80',
                'order' => 4,
                'rank' => 4,
                'sub' => [
                    ['name_ar' => 'غرف المعيشة', 'name_en' => 'Living Room', 'image' => 'https://images.unsplash.com/photo-1586023492125-27b2c045efd7?w=400&q=80'],
                    ['name_ar' => 'مستلزمات المطبخ', 'name_en' => 'Kitchenware', 'image' => 'https://images.unsplash.com/photo-1556911220-e15b29be8c8f?w=400&q=80'],
                ]
            ],
            [
                'name_ar' => 'رياضة واللياقة',
                'name_en' => 'Sports & Fitness',
                'image' => 'https://images.unsplash.com/photo-1517838277536-f5f99be501cd?w=600&q=80',
                'order' => 5,
                'rank' => 5,
                'sub' => [
                    ['name_ar' => 'أجهزة تمارين', 'name_en' => 'Workout Equipment', 'image' => 'https://images.unsplash.com/photo-1540497077202-7c8a3999166f?w=400&q=80'],
                ]
            ],
        ];

        $mainCategories = [];
        $allCategoryIds = [];

        foreach ($categoriesData as $cData) {
            $subs = $cData['sub'] ?? [];
            unset($cData['sub']);

            $mainCat = Category::updateOrCreate(
                ['name_en' => $cData['name_en']],
                $cData
            );
            $mainCategories[] = $mainCat;
            $allCategoryIds[] = $mainCat->id;

            foreach ($subs as $sIdx => $sData) {
                $subCat = Category::updateOrCreate(
                    ['name_en' => $sData['name_en']],
                    array_merge($sData, [
                        'parent_id' => $mainCat->id,
                        'order' => $sIdx + 1,
                        'rank' => $sIdx + 1,
                    ])
                );
                $allCategoryIds[] = $subCat->id;
            }
        }

        // Attach categories to sellers
        foreach ($sellers as $seller) {
            $seller->categories()->sync($allCategoryIds);
        }

        // 4. Create HomePageCategories
        foreach ($mainCategories as $idx => $mainCat) {
            HomePageCategory::updateOrCreate(
                ['category_id' => $mainCat->id],
                [
                    'name_ar' => $mainCat->name_ar,
                    'name_en' => $mainCat->name_en,
                    'sort_order' => $idx + 1,
                ]
            );
        }

        // 5. Create Sliders for Home Page
        $sliders = [
            [
                'name' => 'Mega Summer Electronics Sale',
                'link' => 'https://example.com/promos/electronics',
                'type' => 'banner',
                'video' => null,
                'seller_id' => null,
                'is_paid' => 0,
                'start_date' => null,
                'end_date' => null,
            ],
            [
                'name' => 'Exclusive Summer Fashion 2026 Collection',
                'link' => 'https://example.com/promos/fashion',
                'type' => 'banner',
                'video' => null,
                'seller_id' => null,
                'is_paid' => 0,
                'start_date' => null,
                'end_date' => null,
            ],
            [
                'name' => 'Royal Perfumes & Oud Special Offer',
                'link' => 'https://example.com/promos/perfumes',
                'type' => 'banner',
                'video' => null,
                'seller_id' => null,
                'is_paid' => 0,
                'start_date' => null,
                'end_date' => null,
            ],
            [
                'name' => 'Modern Living Room Furniture Deals',
                'link' => 'https://example.com/promos/furniture',
                'type' => 'banner',
                'video' => null,
                'seller_id' => null,
                'is_paid' => 0,
                'start_date' => null,
                'end_date' => null,
            ],
        ];

        foreach ($sliders as $s) {
            Slider::updateOrCreate(['name' => $s['name']], $s);
        }

        // 6. Create Realistic Products
        $productsData = [
            // Electronics (Seller 0)
            [
                'seller_id' => $sellers[0]->id,
                'category_id' => $mainCategories[0]->id,
                'name_ar' => 'آيفون 15 برو ماكس - 256 جيجابايت',
                'name_en' => 'iPhone 15 Pro Max - 256GB Titanium',
                'title_ar' => 'أقوى هواتف أبل بنظام كاميرات احترافي ومعالج A17 Pro',
                'title_en' => 'Flagship Apple smartphone featuring Titanium design and A17 Pro chip',
                'description_ar' => 'يتميز هاتف iPhone 15 Pro Max بتصميم قوي وخفيف من التيتانيوم بدرجة الطيران، مع زر الإجراءات الجديد وكاميرا تقريب 5x ومحيط إطارات نحيف للغاية.',
                'description_en' => 'iPhone 15 Pro Max features a strong and light aerospace-grade titanium design, action button, 5x telephoto camera, and super retina XDR display.',
                'price' => '4499',
                'old_price' => '4999',
                'quantity' => 25,
                'serving' => '1 قطعة',
                'main_image' => 'https://images.unsplash.com/photo-1695048133142-1a20484d2569?w=600&q=80',
                'is_available' => 1,
            ],
            [
                'seller_id' => $sellers[0]->id,
                'category_id' => $mainCategories[0]->id,
                'name_ar' => 'سماعات سوني اللاسلكية WH-1000XM5',
                'name_en' => 'Sony WH-1000XM5 Wireless Headphones',
                'title_ar' => 'أفضل إلغاء للضوضاء وتجربة صوتية استثنائية',
                'title_en' => 'Industry-leading noise cancelling wireless headphones',
                'description_ar' => 'تعد سماعات سوني XM5 الرائدة في عزل الضوضاء، مع ميكروفونات متعددة وجودة مكالمات فائقة ونقاء صوتي عالي الدقة يدوم حتى 30 ساعة.',
                'description_en' => 'Sony WH-1000XM5 rewrites the rules for distraction-free listening with 30-hour battery life and crystal clear hands-free calling.',
                'price' => '1299',
                'old_price' => '1499',
                'quantity' => 40,
                'serving' => '1 علبة',
                'main_image' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=600&q=80',
                'is_available' => 1,
            ],
            [
                'seller_id' => $sellers[0]->id,
                'category_id' => $mainCategories[0]->id,
                'name_ar' => 'ساعة أبل الجيل التاسع Apple Watch Series 9',
                'name_en' => 'Apple Watch Series 9 GPS 45mm',
                'title_ar' => 'ساعة ذكية متطورة مع شاشة فائقة السطوع وإيماءات الضغط المزدوج',
                'title_en' => 'Advanced health smartwatch with Double Tap gesture and bright display',
                'description_ar' => 'شريحة S9 الجديدة تجعل Apple Watch Series 9 أكثر قدرة وسرعة، مع طريقة سحرية جديدة لاستخدام الساعة بدون لمس الشاشة وميزات صحية متقدمة.',
                'description_en' => 'S9 SiP enables a super-bright display and a magical new way to quickly and easily use your Apple Watch without touching the screen.',
                'price' => '1599',
                'old_price' => '1799',
                'quantity' => 30,
                'serving' => '1 قطعة',
                'main_image' => 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=600&q=80',
                'is_available' => 1,
            ],

            // Fashion (Seller 1)
            [
                'seller_id' => $sellers[1]->id,
                'category_id' => $mainCategories[1]->id,
                'name_ar' => 'سترة جلدية رجالية فاخرة',
                'name_en' => "Men's Luxury Leather Biker Jacket",
                'title_ar' => 'سترة مصنوعة من الجلد الطبيعي بتصميم عصري جذاب',
                'title_en' => 'Premium genuine leather jacket crafted for timeless modern style',
                'description_ar' => 'جاكيت رجالي أنيق من الجلد الطبيعي 100%، يتميز ببطانة داخلية مريحة وسحابات قوية تناسب مختلف الإطلالات الأنيقة.',
                'description_en' => 'Crafted from 100% high-grade leather with a smooth polyester lining and sturdy zip closures.',
                'price' => '499',
                'old_price' => '699',
                'quantity' => 50,
                'serving' => '1 قطعة',
                'main_image' => 'https://images.unsplash.com/photo-1551028719-00167b16eac5?w=600&q=80',
                'is_available' => 1,
            ],
            [
                'seller_id' => $sellers[1]->id,
                'category_id' => $mainCategories[1]->id,
                'name_ar' => 'فستان صيفي من الحرير الأنيق',
                'name_en' => 'Elegant Summer Silk Floral Dress',
                'title_ar' => 'فستان نسائي بتصميم انسيابي مريح وألوان زاهية',
                'title_en' => 'Flowy women silk dress designed for summer elegance',
                'description_ar' => 'فستان حرير ناعم ومريح مع قصة خصر مميزة، يمنحك إطلالة راقية في المناسبات الصيفية واللقاءات الخاصة.',
                'description_en' => 'Soft silk dress with an elegant waist cut, vivid patterns and breathable fabric perfect for summer outings.',
                'price' => '380',
                'old_price' => '490',
                'quantity' => 35,
                'serving' => '1 قطعة',
                'main_image' => 'https://images.unsplash.com/photo-1572804013309-59a88b7e92f1?w=600&q=80',
                'is_available' => 1,
            ],
            [
                'seller_id' => $sellers[1]->id,
                'category_id' => $mainCategories[1]->id,
                'name_ar' => 'نظارات شمسية كلاسيكية قطبية',
                'name_en' => 'Classic Polarized Sunglasses',
                'title_ar' => 'حماية كاملة من الأشعة فوق البنفسجية UV400 بإطار متين',
                'title_en' => 'UV400 protection vintage style polarized sunglasses',
                'description_ar' => 'نظارة شمسية أنيقة توفر رؤية واضحة ومريحة للعين مع حماية من أشعة الشمس، ومناسبة للرجال والنساء.',
                'description_en' => 'High quality unisex sunglasses providing crystal-clear glare control and complete UV400 protection.',
                'price' => '199',
                'old_price' => '279',
                'quantity' => 60,
                'serving' => '1 قطعة',
                'main_image' => 'https://images.unsplash.com/photo-1511499767150-a48a237f0083?w=600&q=80',
                'is_available' => 1,
            ],

            // Perfumes & Beauty (Seller 2)
            [
                'seller_id' => $sellers[2]->id,
                'category_id' => $mainCategories[2]->id,
                'name_ar' => 'عطر ديور سوفاج أو دو بارفان 100 مل',
                'name_en' => 'Dior Sauvage Eau De Parfum 100ml',
                'title_ar' => 'العطر الرجالي الأكثر شهرة وجاذبية بنفحات البخار والبرغموت',
                'title_en' => 'Iconic men fragrance with fresh bergamot and warm amberwood notes',
                'description_ar' => 'عطر رجالي منعش وقوي يمزج بين انتعاش البرغموت ورائحة الفانيليا والأخشاب ليمنحك ثباتاً وفوحاناً يدوم طوال اليوم.',
                'description_en' => 'Sensual and mysterious fragrance combining fresh Calabrian bergamot with Papua New Guinean vanilla absolute.',
                'price' => '520',
                'old_price' => '620',
                'quantity' => 45,
                'serving' => '1 عبوة',
                'main_image' => 'https://images.unsplash.com/photo-1594035910387-fea47794261f?w=600&q=80',
                'is_available' => 1,
            ],
            [
                'seller_id' => $sellers[2]->id,
                'category_id' => $mainCategories[2]->id,
                'name_ar' => 'دهن العود الكمبودي المعتق 12 مل',
                'name_en' => 'Aged Cambodian Oud Oil 12ml',
                'title_ar' => 'عود طبيعي فاخر بدرجة ثبات عالية وفوحان ملكي',
                'title_en' => 'Premium natural aged Cambodian Oud extract with intense royal aroma',
                'description_ar' => 'دهن عود كمبودي صافي معتق لسنوات طويلة، يتميز برائحة بخورية ثقيلة ودافئة تلتصق بالملابس لفترات طويلة.',
                'description_en' => 'Pure aged Cambodian Oud oil offering a deep woody and smoky fragrance that lasts for days.',
                'price' => '650',
                'old_price' => '850',
                'quantity' => 20,
                'serving' => '1 تولة',
                'main_image' => 'https://images.unsplash.com/photo-1547887537-6158d64c35b3?w=600&q=80',
                'is_available' => 1,
            ],
            [
                'seller_id' => $sellers[2]->id,
                'category_id' => $mainCategories[2]->id,
                'name_ar' => 'سيروم فيتامين سي لترطيب وإشراقة البشرة',
                'name_en' => 'Vitamin C Radiance Glowing Serum 30ml',
                'title_ar' => 'سيروم مغذي ومضاد للأكسدة يعيد النضارة والشباب للبشرة',
                'title_en' => 'Antioxidant hydrating serum for radiant glowing youthful skin',
                'description_ar' => 'تركيبة غنية بتركيز 20% فيتامين سي وحمض الهيالورونيك لتفتيح البشرة وتوحيد لونها وتقليل علامات الإجهاد.',
                'description_en' => 'Formulated with 20% pure Vitamin C and Hyaluronic Acid to brighten complexion and reduce fine lines.',
                'price' => '149',
                'old_price' => '199',
                'quantity' => 80,
                'serving' => '1 زجاجة',
                'main_image' => 'https://images.unsplash.com/photo-1620916566398-39f1143ab7be?w=600&q=80',
                'is_available' => 1,
            ],

            // Home & Furniture (Seller 3)
            [
                'seller_id' => $sellers[3]->id,
                'category_id' => $mainCategories[3]->id,
                'name_ar' => 'كرسي مكتبي مريح ذو تصميم ديناميكي',
                'name_en' => 'Ergonomic Executive Office Chair',
                'title_ar' => 'دعم كامل للظهر والرقبة مع إمكانية التعديل وسندات مريحة',
                'title_en' => 'Full lumbar support breathable mesh chair for home office',
                'description_ar' => 'كرسي مكتب احترافي مزود بشبكة تهوية وقاعدة معدنية متينة لضمان الراحة التامة أثناء ساعات العمل الطويلة.',
                'description_en' => 'Designed with adjustable headrest, lumbar support, and high-density cushion for all-day working comfort.',
                'price' => '699',
                'old_price' => '899',
                'quantity' => 15,
                'serving' => '1 كرسي',
                'main_image' => 'https://images.unsplash.com/photo-1580481072645-022f9a6d1270?w=600&q=80',
                'is_available' => 1,
            ],
            [
                'seller_id' => $sellers[3]->id,
                'category_id' => $mainCategories[3]->id,
                'name_ar' => 'طقم كنبة مخملية حديثة ثلاثية',
                'name_en' => 'Modern Velvet 3-Seater Sofa Set',
                'title_ar' => 'تصميم كلاسيكي معاصر بإطار خشبي صلب ونسيج مريح',
                'title_en' => 'Contemporary luxury velvet sofa with solid hardwood frame',
                'description_ar' => 'كنبة مخملية فاخرة تتسع لثلاثة أشخاص بأرجل ذهبية متينة لمسة فاخرة تجعل صالتك أكثر دفئاً وأناقة.',
                'description_en' => 'Upholstered in plush velvet with golden legs, offering both comfort and modern aesthetic to your living space.',
                'price' => '2499',
                'old_price' => '3199',
                'quantity' => 10,
                'serving' => '1 طقم',
                'main_image' => 'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=600&q=80',
                'is_available' => 1,
            ],
            [
                'seller_id' => $sellers[3]->id,
                'category_id' => $mainCategories[3]->id,
                'name_ar' => 'ماكينة إعداد قهوة الإسبريسو 15 بار',
                'name_en' => '15-Bar Professional Espresso Coffee Machine',
                'title_ar' => 'استمتع بأفضل كوب قهوة إسبريسو وكابوتشينو في المنزل',
                'title_en' => 'Barista quality espresso and cappuccino maker with milk frother',
                'description_ar' => 'ماكينة قهوة احترافية بمضخة ضغط 15 بار وعصا تبخير الحليب لإعداد أفضل المشروبات الساخنة بكفاءة عالية.',
                'description_en' => 'Equipped with a 15-bar Italian pump and steam wand to create rich, creamy froth for your favorite lattes.',
                'price' => '849',
                'old_price' => '1099',
                'quantity' => 22,
                'serving' => '1 ماكينة',
                'main_image' => 'https://images.unsplash.com/photo-1517668808822-9e428824603b?w=600&q=80',
                'is_available' => 1,
            ],

            // Sports (Seller 4)
            [
                'seller_id' => $sellers[4]->id,
                'category_id' => $mainCategories[4]->id,
                'name_ar' => 'جهاز سير كهربائي ذكي قابل للطي',
                'name_en' => 'Smart Folding Electric Treadmill',
                'title_ar' => 'محرك قوي وقليل الضجيج مع شاشة LED لمتابعة التمارين',
                'title_en' => 'Heavy duty motorized treadmill with LED display and Bluetooth',
                'description_ar' => 'جهاز مشي وجري منزل ذكي مزود بشاشة قياس السرعة والسعرات الحرارية وسماعات بلوتوث مدمجة.',
                'description_en' => 'Compact folding treadmill featuring multi-layer running belt, silent motor, and app connectivity for daily cardio.',
                'price' => '1899',
                'old_price' => '2299',
                'quantity' => 12,
                'serving' => '1 جهاز',
                'main_image' => 'https://images.unsplash.com/photo-1576678927484-cc909957088c?w=600&q=80',
                'is_available' => 1,
            ],
            [
                'seller_id' => $sellers[4]->id,
                'category_id' => $mainCategories[4]->id,
                'name_ar' => 'طقم أثقال وركام قابل للتعديل 20 كجم',
                'name_en' => 'Adjustable Dumbbell Set 20KG',
                'title_ar' => 'حقيبة أثقال متكاملة للتمارين الرياضية المنزلية',
                'title_en' => 'Solid cast iron weight set with connector bar for home gym',
                'description_ar' => 'طقم أثقال كوتشينغ عالي الجودة قابل للتعديل حتى 20 كجم مع وصلة تحويل لبار طويل لجميع تمارين الجسم.',
                'description_en' => 'Durable dumbbell plates with rubber grip handles and bar coupler to suit various strength workouts.',
                'price' => '299',
                'old_price' => '399',
                'quantity' => 30,
                'serving' => '1 طقم',
                'main_image' => 'https://images.unsplash.com/photo-1584735935682-2f2b69dff9d2?w=600&q=80',
                'is_available' => 1,
            ],
        ];

        $createdProducts = [];
        foreach ($productsData as $pData) {
            $createdProducts[] = Product::updateOrCreate(
                ['name_en' => $pData['name_en']],
                $pData
            );
        }

        // 7. Seed Orders, OrderDetails, and Reviews for top_sellers and best_sellers ranking
        foreach ($sellers as $sIndex => $seller) {
            // Seed 3-6 delivered orders per seller
            $orderCount = (5 - $sIndex) + 2; // Seller 0 gets most orders
            for ($i = 0; $i < $orderCount; $i++) {
                $order = Order::create([
                    'user_id' => $user->id,
                    'seller_id' => $seller->id,
                    'total_price' => rand(300, 2500),
                    'status' => 'delivered',
                    'order_number' => 'ORD-' . strtoupper(substr(md5(uniqid()), 0, 8)),
                    'payment_type' => 'online',
                    'payment_status' => 'paid',
                    'created_at' => now()->subDays(rand(1, 30)),
                ]);

                // Attach 1-2 products belonging to this seller
                $sellerProducts = array_filter($createdProducts, fn($p) => $p->seller_id == $seller->id);
                foreach (array_slice($sellerProducts, 0, 2) as $prod) {
                    OrderDetails::create([
                        'order_id' => $order->id,
                        'product_id' => $prod->id,
                        'price' => $prod->price,
                        'quantity' => rand(2, 5),
                    ]);
                }
            }

            // Create Reviews for seller rating average
            Review::create([
                'user_id' => $user->id,
                'seller_id' => $seller->id,
                'rating' => rand(4, 5),
                'comment' => 'متجر ممتاز وتوصيل سريع والمنتجات ذات جودة عالية جداً.',
            ]);
        }
    }
}
