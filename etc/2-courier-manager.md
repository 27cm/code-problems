
Представь, что у тебя есть:
 - Большой нагруженный проект.
 - Каждую минуту регистрируются сотни новых курьеров в системе.
 - Курьеры регистрируются через разные API: Android, iOS, Telegram Bot и партнёрские сервисы.
 - Проект растёт и развивается, постоянно добаляются новые фичи в процесс регистрации курьеров.
 - За регистрацию всех курьеров в системе отвечает класс CourierManager.

**Какие видишь проблемы в текущей реализации кода?**<br>
**Как можно их исправить? (просто опиши идеи, не нужно переписывать код)**

```php
/**
 * Класс для добавления новых курьеров.
 *
 * Пример использования:
 * CourierManager::createCourier(
 *     '+7 903 123-45-67',
 *     ['name' => 'Иван', 'surname' => 'Петров', ...],
 *     ['inn_number' => '7712345678', ...],
 *     ['inn_number' => STATUS_VERIFIED, ...]
 * );
 * $courier = CourierManager::$lastCreatedCourierRow
 */
class CourierManager {
    public static CourierRow $lastCreatedCourierRow;

    /**
     * Создаёт нового курьера и сохраняет его в базу данных.
     * @param mixed[] $courierData        Данные курьера.
     * @param mixed[] $requisitesData     Реквизиты курьера.
     * @param int[]   $requisitesStatuses Коды статусов реквизитов курьера (одобрен или не одобрен оператором).
     * @param mixed[] $vehicleData        Данные о транспортном средстве курьера.
     * @param string  $referralPromoCode  Использованный реферальный промокод (если курьера привёл его друг).
     */
    public static function createCourier(
        string $phone,
        array $courierData,
        array $requisitesData,
        array $requisitesStatuses,
        array $vehicleData = [],
        ?string $referralPromoCode = null,
        ?string $dateOfBirth = null,
    ): void {
        // Сохраняем данные курьера в базу: INSERT INTO couriers ...
        static::$lastCreatedCourierRow = CouriersTable::makeUnsavedRow();

        static::$lastCreatedCourierRow->status_id           = $courierData['status'];
        static::$lastCreatedCourierRow->region_id           = $courierData['region_id'];
        static::$lastCreatedCourierRow->registered_datetime = date('Y-m-d H:i:s');
        static::$lastCreatedCourierRow->phone               = $phone;
        static::$lastCreatedCourierRow->user_name           = $courierData['name'];
        static::$lastCreatedCourierRow->user_surname        = $courierData['surname'];
        static::$lastCreatedCourierRow->user_middlename     = $courierData['middlename'];
        static::$lastCreatedCourierRow->email               = $courierData['email'];
        static::$lastCreatedCourierRow->date_of_birth       = $dateOfBirth;
        static::$lastCreatedCourierRow->save();

        $courier = static::$lastCreatedCourierRow;

        // Сохраняем реквизиты курьера в базу: INSERT INTO courier_requisites ...
        $courierRequisiteRow = CourierRequisitesTable::makeUnsavedRow();

        $courierRequisiteRow->courier_id                       = $courier->courier_id;
        $courierRequisiteRow->inn_number                       = $requisitesData['inn_number'];
        $courierRequisiteRow->inn_number_verification_status   = $requisitesStatuses['inn_number'];
        $courierRequisiteRow->inn_photo                        = $requisitesData['inn_photo'];
        $courierRequisiteRow->snils_number                     = $requisitesData['snils_number'];
        $courierRequisiteRow->snils_number_verification_status = $requisitesStatuses['snils_number'];
        $courierRequisiteRow->snils_photo                      = $requisitesData['snils_photo'];
        $courierRequisiteRow->save();

        // Сохраняем данные о транспортном средстве курьера в базу: INSERT INTO courier_vehicles ...
        if ($vehicleData) {
            $courierVehicleRow = CourierVehiclesTable::makeUnsavedRow();

            $courierVehicleRow->courier_id         = $courier->courier_id;
            $courierVehicleRow->type               = $vehicleData['type'];
            $courierVehicleRow->model_name         = $vehicleData['model_name'];
            $courierVehicleRow->color              = $vehicleData['color'];
            $courierVehicleRow->tonnage_kg         = $vehicleData['tonnage_kg'];
            $courierVehicleRow->volume_m3          = $vehicleData['volume_m3'];
            $courierVehicleRow->registration_plate = $vehicleData['registration_plate'];
            $courierVehicleRow->save();
        }

        $phone = $courier->phone;
        $count = CouriersTable::getCell("SELECT COUNT(*) FROM couriers WHERE phone = :phone", ['phone' => $phone]);
        if (2 < $count) {
            $courier->delete();
            throw new CourierExistsException("Courier with phone number {$phone} already exists");
        }

        if ($referralPromoCode) {
            // Начисляем бонусные баллы курьеру, если он пришёл по реферальной ссылке
            CourierReferralPromoCodeUsagesTable::usePromoCode($courier, $referralPromoCode);

            // Создаём реферальный промокод новом курьеру, чтобы он тоже мог
            // приглашать других курьеров и получать за это бонусные баллы
            CourierReferralPromoCodesTable::create($courier->user_id);
        }
    }
}
```
