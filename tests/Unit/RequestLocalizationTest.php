<?php

namespace Tests\Unit;

use Tests\TestCase;

class RequestLocalizationTest extends TestCase
{
    /**
     * Test translations for all localized Form Requests.
     */
    public function test_all_requests_return_correct_translations()
    {
        $requests = [
            // Seller Requests
            \App\Http\Requests\Seller\Product\StoreRequest::class => [
                'name_ar.required' => [
                    'en' => 'The Arabic name is required.',
                    'ae' => 'الاسم باللغة العربية مطلوب.',
                ],
                'name_en.required' => [
                    'en' => 'The English name is required.',
                    'ae' => 'الاسم باللغة الإنجليزية مطلوب.',
                ],
                'main_image.max' => [
                    'en' => 'The main image must not exceed 2MB.',
                    'ae' => 'يجب ألا تتجاوز الصورة الرئيسية 2 ميجابايت.',
                ]
            ],
            \App\Http\Requests\Seller\Product\EditRequest::class => [
                'description_ar.required' => [
                    'en' => 'The Arabic description is required.',
                    'ae' => 'الوصف باللغة العربية مطلوب.',
                ],
                'main_image.max' => [
                    'en' => 'The main image must not exceed 2MB.',
                    'ae' => 'يجب ألا تتجاوز الصورة الرئيسية 2 ميجابايت.',
                ]
            ],
            \App\Http\Requests\Seller\Auth\LoginRequest::class => [
                'phone.exists' => [
                    'en' => 'The phone number is not registered.',
                    'ae' => 'رقم الهاتف هذا غير مسجل لدينا.',
                ]
            ],

            // Auth Requests
            \App\Http\Requests\Auth\CheckPhoneExists::class => [
                'phone.exists' => [
                    'en' => 'The phone number is not registered.',
                    'ae' => 'رقم الهاتف هذا غير مسجل لدينا.',
                ]
            ],
            \App\Http\Requests\Auth\LoginRequest::class => [
                'phone.required' => [
                    'en' => 'Phone is required',
                    'ae' => 'رقم الهاتف مطلوب',
                ],
                'password.required' => [
                    'en' => 'Please enter a password.',
                    'ae' => 'يرجى إدخال كلمة المرور.',
                ]
            ],
            \App\Http\Requests\Auth\AdminLoginRequest::class => [
                'email.exists' => [
                    'en' => 'The email was not found.',
                    'ae' => 'البريد الإلكتروني غير موجود.',
                ]
            ],
            \App\Http\Requests\Auth\RegisterRequest::class => [
                'email.unique' => [
                    'en' => 'The email has already been taken.',
                    'ae' => 'البريد الإلكتروني مستخدم بالفعل.',
                ],
                'password.required' => [
                    'en' => 'Please enter a password.',
                    'ae' => 'يرجى إدخال كلمة المرور.',
                ]
            ],

            // Driver Requests
            \App\Http\Requests\Driver\Auth\LoginRequest::class => [
                'email.required' => [
                    'en' => 'The email is required.',
                    'ae' => 'البريد الإلكتروني مطلوب.',
                ],
                'password.required' => [
                    'en' => 'Please enter a password.',
                    'ae' => 'يرجى إدخال كلمة المرور.',
                ]
            ],

            // Client Requests
            \App\Http\Requests\Client\SpecialRequest\SpecialRequestsRequest::class => [
                'category_id.required' => [
                    'en' => 'Category is required',
                    'ae' => 'الفئة مطلوبة',
                ],
                'time.date_format' => [
                    'en' => 'The time must be in the format HH:MM.',
                    'ae' => 'الوقت يجب أن يكون بتنسيق HH:MM.',
                ]
            ],
            \App\Http\Requests\Client\SpecialRequest\SpecialRequestDetailsRequest::class => [
                'special_requests_id.required' => [
                    'en' => 'The special request ID is required.',
                    'ae' => 'معرف الطلب الخاص مطلوب.',
                ]
            ],
            \App\Http\Requests\Client\PaymentRequest::class => [
                'payment_method.required' => [
                    'en' => 'Payment method is required.',
                    'ae' => 'طريقة الدفع مطلوبة.',
                ],
                'order_id.required_without' => [
                    'en' => 'Order ID or Group ID is required.',
                    'ae' => 'معرف الطلب أو معرف المجموعة مطلوب.',
                ]
            ],
            \App\Http\Requests\Client\Password\CheckRequest::class => [
                'password.required' => [
                    'en' => 'Please enter a password.',
                    'ae' => 'يرجى إدخال كلمة المرور.',
                ],
                'password.regex' => [
                    'en' => 'Password must include an uppercase letter, a lowercase letter, a number, and a special character.',
                    'ae' => 'يجب أن تحتوي كلمة المرور على حرف كبير، وحرف صغير، ورقم، ورمز خاص.',
                ]
            ],
            \App\Http\Requests\Client\Order\RateOrderRequest::class => [
                'order_id.required' => [
                    'en' => 'The Order ID is required.',
                    'ae' => 'معرف الطلب مطلوب.',
                ],
                'rating.max' => [
                    'en' => 'The rating must not exceed 5.',
                    'ae' => 'يجب ألا يتجاوز التقييم 5.',
                ]
            ],
            \App\Http\Requests\Client\Order\CancelRequest::class => [
                'id.required' => [
                    'en' => 'The Order ID is required.',
                    'ae' => 'معرف الطلب مطلوب.',
                ]
            ],
            \App\Http\Requests\Client\favourite\DeleteSellerRequest::class => [
                'favourite_id.required' => [
                    'en' => 'The favourite ID is required.',
                    'ae' => 'معرف المفضلة مطلوب.',
                ]
            ],
            \App\Http\Requests\Client\favourite\DeleteProductRequest::class => [
                'favourite_id.required' => [
                    'en' => 'The favourite ID is required.',
                    'ae' => 'معرف المفضلة مطلوب.',
                ]
            ],
            \App\Http\Requests\Client\Order\StoreRequest::class => [
                'products.required' => [
                    'en' => 'The Products field is required',
                    'ae' => 'حقل المنتجات مطلوب',
                ],
                'address_id.required' => [
                    'en' => 'The address is required.',
                    'ae' => 'العنوان مطلوب.',
                ]
            ],
            \App\Http\Requests\Client\events\EditEventRequest::class => [
                'event_category_id.required' => [
                    'en' => 'The event category is required.',
                    'ae' => 'قسم الفعالية مطلوب.',
                ],
                'f_phone.required_if' => [
                    'en' => 'The female phone number is required when the type is female or both.',
                    'ae' => 'رقم الهاتف للإناث مطلوب عندما يكون النوع إناث أو كلاهما.',
                ]
            ],
            \App\Http\Requests\Client\EditProfileRequest::class => [
                'phone.unique' => [
                    'en' => 'The phone number has already been taken.',
                    'ae' => 'رقم الهاتف مستخدم بالفعل.',
                ]
            ],
            \App\Http\Requests\Client\events\StoreEventRequest::class => [
                'image.required' => [
                    'en' => 'The event image is required.',
                    'ae' => 'صورة الفعالية مطلوبة.',
                ],
                'whatsApp_number.required_if' => [
                    'en' => 'The WhatsApp number is required when the type is male or both.',
                    'ae' => 'رقم الواتساب مطلوب عندما يكون النوع ذكور أو كلاهما.',
                ]
            ],
            \App\Http\Requests\Client\Discount\CheckRequest::class => [
                'code.exists' => [
                    'en' => 'The code Is Not found.',
                    'ae' => 'لم يتم العثور على الكود.',
                ],
                'code.required' => [
                    'en' => 'The code is required.',
                    'ae' => 'الكود مطلوب.',
                ]
            ],
            \App\Http\Requests\Client\CheckProductDetailsRequest::class => [
                'id.required' => [
                    'en' => 'The ID is required.',
                    'ae' => 'المعرف مطلوب.',
                ]
            ],
            \App\Http\Requests\Client\CheckPhoneRequest::class => [
                'phone.unique' => [
                    'en' => 'This phone number is already registered.',
                    'ae' => 'رقم الهاتف هذا مسجل بالفعل لدينا.',
                ]
            ],
            \App\Http\Requests\Client\City\CheckRequest::class => [
                'id.required' => [
                    'en' => 'The ID is required.',
                    'ae' => 'المعرف مطلوب.',
                ]
            ],
            \App\Http\Requests\Client\City\EditRequest::class => [
                'id.required' => [
                    'en' => 'The ID is required.',
                    'ae' => 'المعرف مطلوب.',
                ],
                'address_id.required' => [
                    'en' => 'The address ID is required.',
                    'ae' => 'معرف العنوان مطلوب.',
                ]
            ],
            \App\Http\Requests\Client\CheckPhoneExists::class => [
                'phone.exists' => [
                    'en' => 'The phone number is not registered.',
                    'ae' => 'رقم الهاتف هذا غير مسجل لدينا.',
                ]
            ],
            \App\Http\Requests\Client\CheckClientExistsRequest::class => [
                'phone.unique' => [
                    'en' => 'The phone number has already been taken.',
                    'ae' => 'رقم الهاتف مستخدم بالفعل.',
                ],
                'email.unique' => [
                    'en' => 'The email has already been taken.',
                    'ae' => 'البريد الإلكتروني مستخدم بالفعل.',
                ]
            ],
            \App\Http\Requests\Client\City\StoreRequest::class => [
                'id.required' => [
                    'en' => 'The ID is required.',
                    'ae' => 'المعرف مطلوب.',
                ]
            ],
            \App\Http\Requests\Client\Basket\StoreRequest::class => [
                'products.required' => [
                    'en' => 'The Products field is required',
                    'ae' => 'حقل المنتجات مطلوب',
                ],
                'address_id.required' => [
                    'en' => 'The address is required.',
                    'ae' => 'العنوان مطلوب.',
                ]
            ],
            \App\Http\Requests\Client\Basket\CancelRequest::class => [
                'id.required' => [
                    'en' => 'The Order ID is required.',
                    'ae' => 'معرف الطلب مطلوب.',
                ]
            ],
            \App\Http\Requests\Client\Auth\SocialRequest::class => [
                'provider.required' => [
                    'en' => 'The provider is required.',
                    'ae' => 'مزود الخدمة مطلوب.',
                ],
                'token.required' => [
                    'en' => 'The token is required.',
                    'ae' => 'الرمز (token) مطلوب.',
                ]
            ],

            // Admin Requests
            \App\Http\Requests\Admin\Admins\EditRequest::class => [
                'email.unique' => [
                    'en' => 'The email has already been taken.',
                    'ae' => 'البريد الإلكتروني مستخدم بالفعل.',
                ],
            ],
            \App\Http\Requests\Admin\Admins\StoreRequest::class => [
                'email.unique' => [
                    'en' => 'The email has already been taken.',
                    'ae' => 'البريد الإلكتروني مستخدم بالفعل.',
                ],
            ],
            \App\Http\Requests\Admin\Ads\StoreRequest::class => [
                'category_id.required' => [
                    'en' => 'The category field is required.',
                    'ae' => 'حقل القسم مطلوب.',
                ],
                'category_id.exists' => [
                    'en' => 'The selected category is invalid.',
                    'ae' => 'القسم المحدد غير صالح.',
                ],
            ],
            \App\Http\Requests\Admin\Attribute\EditRequest::class => [
                'name_ar.required' => [
                    'en' => 'The Arabic name is required',
                    'ae' => 'الاسم بالعربية مطلوب',
                ],
                'name_ar.unique' => [
                    'en' => 'The Arabic name must be unique',
                    'ae' => 'الاسم بالعربية يجب ان يكون فريد',
                ],
            ],
            \App\Http\Requests\Admin\Attribute\StoreRequest::class => [
                'name_ar.required' => [
                    'en' => 'The Arabic name is required',
                    'ae' => 'الاسم بالعربية مطلوب',
                ],
                'name_ar.unique' => [
                    'en' => 'The Arabic name must be unique',
                    'ae' => 'الاسم بالعربية يجب ان يكون فريد',
                ],
            ],
            \App\Http\Requests\Admin\Category\EditRequest::class => [
                'image.max' => [
                    'en' => 'The image size must not exceed 1024 kilobytes',
                    'ae' => 'حجم الصورة لا يجب ان يتجاوز 1024 كيلو بايت',
                ],
            ],
            \App\Http\Requests\Admin\Category\StoreRequest::class => [
                'image.max' => [
                    'en' => 'The image size must not exceed 1024 kilobytes',
                    'ae' => 'حجم الصورة لا يجب ان يتجاوز 1024 كيلو بايت',
                ],
            ],
            \App\Http\Requests\Admin\CategoryAttribute\EditRequest::class => [
                'mandatory.required' => [
                    'en' => 'Mandatory field is required',
                    'ae' => 'الحقل الاجباري مطلوب',
                ],
                'mandatory.boolean' => [
                    'en' => 'Mandatory field must be boolean',
                    'ae' => 'الحقل الاجباري يجب ان يكون من الاختيارات',
                ],
            ],
            \App\Http\Requests\Admin\CategoryAttribute\StoreRequests::class => [
                'mandatory.required' => [
                    'en' => 'Mandatory field is required',
                    'ae' => 'الحقل الاجباري مطلوب',
                ],
                'mandatory.boolean' => [
                    'en' => 'Mandatory field must be boolean',
                    'ae' => 'الحقل الاجباري يجب ان يكون من الاختيارات',
                ],
            ],
            \App\Http\Requests\Admin\Discount\StoreRequest::class => [
                'coupons_number.min' => [
                    'en' => 'Total Coupons must be greater than or equal to user coupons limit.',
                    'ae' => 'إجمالي الكوبونات يجب أن يكون أكبر من أو يساوي حد الكوبونات للمستخدم.',
                ],
                'end_date.after' => [
                    'en' => 'End date must be after start date',
                    'ae' => 'تاريخ الانتهاء يجب أن يكون بعد تاريخ البداية',
                ],
            ],
            \App\Http\Requests\Admin\Driver\EditRequest::class => [
                'email.unique' => [
                    'en' => 'The email has already been taken.',
                    'ae' => 'البريد الإلكتروني مستخدم بالفعل.',
                ],
                'phone.unique' => [
                    'en' => 'The phone number has already been taken.',
                    'ae' => 'رقم الهاتف مستخدم بالفعل.',
                ],
            ],
            \App\Http\Requests\Admin\Driver\StoreRequest::class => [
                'email.unique' => [
                    'en' => 'The email has already been taken.',
                    'ae' => 'البريد الإلكتروني مستخدم بالفعل.',
                ],
                'phone.unique' => [
                    'en' => 'The phone number has already been taken.',
                    'ae' => 'رقم الهاتف مستخدم بالفعل.',
                ],
            ],
            \App\Http\Requests\Admin\EventCategory\EditRequest::class => [
                'image.max' => [
                    'en' => 'The image size must not exceed 1024 kilobytes',
                    'ae' => 'حجم الصورة لا يجب ان يتجاوز 1024 كيلو بايت',
                ],
            ],
            \App\Http\Requests\Admin\EventCategory\StoreRequest::class => [
                'image.max' => [
                    'en' => 'The image size must not exceed 1024 kilobytes',
                    'ae' => 'حجم الصورة لا يجب ان يتجاوز 1024 كيلو بايت',
                ],
            ],
            \App\Http\Requests\Admin\HomePageCategory\EditRequest::class => [
                'id.required' => [
                    'en' => 'The ID is required.',
                    'ae' => 'المعرف مطلوب.',
                ],
                'id.exists' => [
                    'en' => 'The selected ID does not exist',
                    'ae' => 'رقم التعريف المحدد غير موجود',
                ],
            ],
            \App\Http\Requests\Admin\HomePageCategory\StoreRequest::class => [
                'category_id.required' => [
                    'en' => 'The category field is required.',
                    'ae' => 'حقل القسم مطلوب.',
                ],
                'category_id.exists' => [
                    'en' => 'The selected category does not exist',
                    'ae' => 'الفئة المحددة غير موجودة',
                ],
            ],
            \App\Http\Requests\Admin\Product\StoreRequest::class => [
                'name_ar.required' => [
                    'en' => 'The Arabic name is required.',
                    'ae' => 'الاسم باللغة العربية مطلوب.',
                ],
                'name_en.required' => [
                    'en' => 'The English name is required.',
                    'ae' => 'الاسم باللغة الإنجليزية مطلوب.',
                ],
            ],
            \App\Http\Requests\Admin\RejectedReasons\EditRequest::class => [
                'name.required' => [
                    'en' => 'The name is required',
                    'ae' => 'الاسم مطلوب',
                ],
                'description.required' => [
                    'en' => 'The description is required',
                    'ae' => 'الوصف مطلوب',
                ],
            ],
            \App\Http\Requests\Admin\RejectedReasons\StoreRequest::class => [
                'name.required' => [
                    'en' => 'The name is required',
                    'ae' => 'الاسم مطلوب',
                ],
                'description.required' => [
                    'en' => 'The description is required',
                    'ae' => 'الوصف مطلوب',
                ],
            ],
            \App\Http\Requests\Admin\ReportOption\StoreRequest::class => [
                'title_ar.required' => [
                    'en' => 'The title in Arabic is required',
                    'ae' => 'العنوان بالعربية مطلوب',
                ],
                'title_en.required' => [
                    'en' => 'The title in English is required',
                    'ae' => 'العنوان بالإنجليزية مطلوب',
                ],
            ],
            \App\Http\Requests\Admin\Seller\EditRequest::class => [
                'email.unique' => [
                    'en' => 'The email has already been taken.',
                    'ae' => 'البريد الإلكتروني مستخدم بالفعل.',
                ],
                'img_path.max' => [
                    'en' => 'The image size must not exceed 1024 kilobytes',
                    'ae' => 'حجم الصورة لا يجب ان يتجاوز 1024 كيلو بايت',
                ],
            ],
            \App\Http\Requests\Admin\Seller\StoreRequest::class => [
                'email.unique' => [
                    'en' => 'The email has already been taken.',
                    'ae' => 'البريد الإلكتروني مستخدم بالفعل.',
                ],
                'img_path.max' => [
                    'en' => 'The image size must not exceed 1024 kilobytes',
                    'ae' => 'حجم الصورة لا يجب ان يتجاوز 1024 كيلو بايت',
                ],
            ],
            \App\Http\Requests\Admin\SpecialRequest\SpecialRequestDetailsRequest::class => [
                'special_requests_id.required' => [
                    'en' => 'The special request ID is required.',
                    'ae' => 'معرف الطلب الخاص مطلوب.',
                ],
                'special_requests_id.exists' => [
                    'en' => 'The selected special request does not exist.',
                    'ae' => 'الطلب الخاص المحدد غير موجود.',
                ],
            ],
            \App\Http\Requests\Admin\SpecialRequest\SpecialRequestsRequest::class => [
                'category_id.required' => [
                    'en' => 'Category is required',
                    'ae' => 'الفئة مطلوبة',
                ],
                'category_id.exists' => [
                    'en' => 'Category not found',
                    'ae' => 'الفئة غير موجودة',
                ],
            ]
        ];

        foreach ($requests as $class => $assertions) {
            $request = new $class();
            $messagesMethod = new \ReflectionMethod($request, 'messages');
            $messagesMethod->setAccessible(true);

            // Test English Translations
            app()->setLocale('en');
            $messages = $messagesMethod->invoke($request);
            foreach ($assertions as $key => $values) {
                $this->assertArrayHasKey($key, $messages, "Key '{$key}' missing in messages() of {$class}");
                $this->assertEquals($values['en'], $messages[$key], "English translation for '{$key}' mismatch in {$class}");
            }

            // Test Arabic Translations
            app()->setLocale('ae');
            $messages = $messagesMethod->invoke($request);
            foreach ($assertions as $key => $values) {
                $this->assertArrayHasKey($key, $messages, "Key '{$key}' missing in messages() of {$class}");
                $this->assertEquals($values['ae'], $messages[$key], "Arabic translation for '{$key}' mismatch in {$class}");
            }
        }
    }

    /**
     * Test that every Form Request in the application that overrides messages() has valid, non-empty,
     * different English and Arabic translations, and does not contain raw key fallbacks.
     */
    public function test_every_single_form_request_in_system_has_valid_localization()
    {
        $requestsDir = app_path('Http/Requests');
        if (!is_dir($requestsDir)) {
            $this->markTestSkipped('Http/Requests directory does not exist.');
        }

        $dir = new \RecursiveDirectoryIterator($requestsDir);
        $iterator = new \RecursiveIteratorIterator($dir);
        $regex = new \RegexIterator($iterator, '/^.+\.php$/i', \RecursiveRegexIterator::GET_MATCH);

        $checkedClasses = 0;

        foreach ($regex as $file) {
            $filePath = $file[0];
            $content = file_get_contents($filePath);
            
            // Extract namespace
            if (!preg_match('/namespace\s+([^;]+);/', $content, $nsMatch)) {
                continue;
            }
            $namespace = trim($nsMatch[1]);
            
            // Extract class name
            if (!preg_match('/class\s+(\w+)/', $content, $classMatch)) {
                continue;
            }
            $className = $namespace . '\\' . $classMatch[1];
            
            if (!class_exists($className)) {
                continue;
            }

            $reflection = new \ReflectionClass($className);
            if ($reflection->isAbstract()) {
                continue;
            }

            $request = new $className();
            
            // Check if the messages method is declared and overridden in this class (not inherited from parent FormRequest)
            if (!$reflection->hasMethod('messages')) {
                continue;
            }

            $messagesMethod = $reflection->getMethod('messages');
            $declaringClass = $messagesMethod->getDeclaringClass()->getName();
            $isOverridden = !in_array($declaringClass, [
                'Illuminate\Foundation\Http\FormRequest',
                'Illuminate\Http\Request'
            ]);

            if (!$isOverridden) {
                continue;
            }

            $messagesMethod->setAccessible(true);

            // Test English locale
            app()->setLocale('en');
            $enMessages = $messagesMethod->invoke($request);

            // Test Arabic locale
            app()->setLocale('ae');
            $aeMessages = $messagesMethod->invoke($request);

            $this->assertIsArray($enMessages, "messages() in {$className} should return an array.");
            $this->assertIsArray($aeMessages, "messages() in {$className} should return an array.");

            foreach ($enMessages as $key => $enVal) {
                $this->assertArrayHasKey($key, $aeMessages, "Arabic messages missing key '{$key}' defined in English in class {$className}");
                
                $aeVal = $aeMessages[$key];

                // Verify not empty
                $this->assertNotEmpty($enVal, "English translation for key '{$key}' in {$className} is empty.");
                $this->assertNotEmpty($aeVal, "Arabic translation for key '{$key}' in {$className} is empty.");

                // Verify not a raw key (missing translation)
                $this->assertFalse(str_starts_with($enVal, 'lang.'), "English translation key '{$key}' in {$className} is missing from translation file (returns '{$enVal}').");
                $this->assertFalse(str_starts_with($aeVal, 'lang.'), "Arabic translation key '{$key}' in {$className} is missing from translation file (returns '{$aeVal}').");
                
                $this->assertFalse(str_starts_with($enVal, 'validation.'), "English translation key '{$key}' in {$className} is missing from translation file (returns '{$enVal}').");
                $this->assertFalse(str_starts_with($aeVal, 'validation.'), "Arabic translation key '{$key}' in {$className} is missing from translation file (returns '{$aeVal}').");

                // Verify that English and Arabic translations are not identical (should be localized) if it contains alphabetical characters
                if (preg_match('/[a-zA-Z]/', $enVal)) {
                    $this->assertNotEquals(
                        $enVal,
                        $aeVal,
                        "Translation for key '{$key}' in {$className} is identical in both English and Arabic. Ensure it is translated correctly."
                    );
                }
            }

            $checkedClasses++;
        }

        // Assert that we checked a reasonable number of requests to ensure scanning works
        $this->assertGreaterThan(0, $checkedClasses, "No custom Form Requests were found/checked.");
    }
}
