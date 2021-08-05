/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(<?php echo e($reflection->getName()); ?>::class, function (Faker $faker) {
    return [
<?php $__currentLoopData = $properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        '<?php echo e($name); ?>' => <?php echo $property; ?>,
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    ];
});
<?php /**PATH /var/www/html/programmation/vendor/mpociot/laravel-test-factory-helper/src/../resources/views/factory.blade.php ENDPATH**/ ?>