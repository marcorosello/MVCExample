
<?php include(THEME_INCLUDES_DIR . '/Header.php'); ?>

<?php include(THEME_INCLUDES_DIR . '/Navigation.php'); ?>

<div class="container" role="main">
    <div class="page-header">
        <h1><?= $data['Title']; ?></h1>
    </div>

    <div class="row">
        <div class="col-md-8">
            <?= $data['FilterForm']; ?>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-8">
            <div id="LineChart"></div>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-4">
            <h4>Total number of customers: <?= $data['TotalCustomers'] ?></h4>
            <h4>Top 10 best customers:</h4>
            <ul>
                <?php if(isset($data['TopCustomersByNumOfOrders'])) {?>
                    <?php foreach($data['TopCustomersByNumOfOrders'] as $customer) { ?>
                        <li class="customer"><?= $customer->getName(); ?></li>
                    <?php } ?>
                <?php } ?>
            </ul>
        </div>

        <div class="col-md-4">
            <h4>Total number of orders: <?= $data['TotalOrders'] ?></h4>
            <h4>Top 10 orders by revenue:</h4>
            <ul>
                <?php if(isset($data['TopOrdersByRevenue'])) {?>
                    <?php foreach($data['TopOrdersByRevenue'] as $order) { ?>
                        <li class="customer">
                            <strong>ID:</strong> <?= $order->getID()?>
                            <strong>Amount: </strong><?= $order->getTotalRevenue()->forTemplate() ?>
                        </li>
                    <?php } ?>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>

<?php include(THEME_INCLUDES_DIR . '/Footer.php'); ?>