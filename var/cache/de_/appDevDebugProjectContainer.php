<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerNq2zxiz\appDevDebugProjectContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerNq2zxiz/appDevDebugProjectContainer.php') {
    touch(__DIR__.'/ContainerNq2zxiz.legacy');

    return;
}

if (!\class_exists(appDevDebugProjectContainer::class, false)) {
    \class_alias(\ContainerNq2zxiz\appDevDebugProjectContainer::class, appDevDebugProjectContainer::class, false);
}

return new \ContainerNq2zxiz\appDevDebugProjectContainer([
    'container.build_hash' => 'Nq2zxiz',
    'container.build_id' => 'ddb78ad7',
    'container.build_time' => 1638286572,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerNq2zxiz');
