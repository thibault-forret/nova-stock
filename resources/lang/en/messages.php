<?php

return [

    'action_success' => 'Your action was successful.',
    'action_failed' => 'Your action failed. Please try again.',
    'action_not_allowed' => 'You are not allowed to perform this action.',
    'action_not_found' => 'The action you are trying to perform does not exist.',
    'langage_not_supported' => 'Language not supported',
    'confirm_order' => 'Your order has been confirmed.',
    'product_added' => 'Product added successfully.',
    'problem_when_adding_product' => 'There was a problem adding the product. Please try again.',
    'stock_not_found' => 'The stock was not found. Please try again.',
    'invoice_not_found' => 'The invoice was not found. Please try again.',
    'invoice_already_settled' => 'The invoice is already settled.',
    'invoice_settled' => 'The invoice has been settled.',
    'invoice_not_settled' => 'The invoice has not been settled. Please try again.',

    'login_required' => 'You must be logged in to access this page.',

    'order_not_found' => 'The order was not found. Please try again.',
    'order_not_in_progress' => 'The order is not in progress. Please try again.',
    'order_not_pending' => 'The order is not pending. Please try again.',
    'order_removed' => 'The order has been removed.',
    'order_created' => 'The order has been created.',
    'quantity_exceed_stock' => 'The quantity exceeds the stock. Please try again.',
    'product_not_in_order' => 'The product is not in the order. Please try again.',
    'product_removed' => 'The product has been removed.',
    'remove_quantity_success' => 'The quantity has been removed successfully.',
    'order_empty' => 'The order is empty. Please add products.',
    'order_confirmed' => 'The order has been confirmed.',
    'order_delivered' => 'The order has been delivered.',
    'order_refused' => 'The order has been refused.',

    'supply_not_found' => 'The supply was not found. Please try again.',
    'supply_not_in_progress' => 'The supply is not in progress. Please try again.',
    'supply_removed' => 'The supply has been removed.',

    'validate' => [
        'usernmame_required' => 'Please provide your username.',
        'username_string' => 'Please provide a valid username.',
        'email_valid' => 'Please provide a valid email address.',
        'email_required' => 'Please provide your email address.',
        'password_required' => 'Please provide your password.',
        'search_by_name_string' => 'The product name must be a string.',
        'supplier_name_exists' => 'The selected supplier does not exist.',
        'supplier_name_required' => 'The supplier name is required.',
        'category_name_exists' => 'The selected category does not exist.',
        'page_number_integer' => 'The page number must be an integer.',
        'page_number_min' => 'The page number must be greater than or equal to 1.',
        'product_not_found' => 'The product was not found. Please try again.',
        'problem_with_product_data' => 'There was a problem with the product data. Please try again.',
        'problem_when_updating_product' => 'There was a problem updating the product. Please try again.',
        'problem_when_deleting_product' => 'There was a problem deleting the product. Please try again.',
        'quantity_required' => 'Quantity is required.',
        'quantity_integer' => 'Quantity must be an integer.',
        'quantity_min' => 'Quantity must be greater than or equal to 1.',
        'quantity_gte' => 'Quantity must be greater than or equal to the restock threshold.',
        'restock_threshold_required' => 'Restock threshold is required.',
        'restock_threshold_integer' => 'Restock threshold must be an integer.',
        'restock_threshold_min' => 'Restock threshold must be greater than or equal to 0.',
        'alert_threshold_required' => 'Alert threshold is required.',
        'alert_threshold_integer' => 'Alert threshold must be an integer.',
        'alert_threshold_min' => 'Alert threshold must be greater than or equal to 1.',
        'alert_threshold_gte' => 'Alert threshold must be greater than or equal to the restock threshold.',
        'auto_restock_quantity_required' => 'Auto restock quantity is required.',
        'auto_restock_quantity_integer' => 'Auto restock quantity must be an integer.',
        'auto_restock_quantity_min' => 'Auto restock quantity must be greater than or equal to 1.',
        'auto_restock_quantity_gte' => 'Auto restock quantity must be greater than or equal to the restock threshold.',
        'quantity_exceeds_capacity' => 'The quantity of products exceeds the warehouse capacity. Please try again.',
        'thresholds_exceeds_capacity' => 'The thresholds exceed the warehouse capacity. Please try again.',
        'stock_id_required' => 'Stock ID is required.',
        'stock_id_integer' => 'Stock ID must be an integer.',
        'quantity_to_high' => 'The quantity to remove is greater than the available quantity.',
        'products_required' => 'Products are required.',
        'products_array' => 'Products must be an array.',
        'products_each_required' => 'Each product is required.',
        'products_each_integer' => 'Each product must be an integer.',
        'products_each_exists' => 'Each product must exist.',
        'quantities_required' => 'Quantities are required.',
        'quantities_array' => 'Quantities must be an array.',
        'quantities_each_required' => 'Each quantity is required.',
        'quantities_each_integer' => 'Each quantity must be an integer.',
        'quantities_each_min' => 'Each quantity must be greater than or equal to 1.',
        'products_not_in_stock' => 'The product(s) is/are not referenced in the warehouse.',
        'supplier_string' => 'The supplier must be a string.',
        'order_required' => 'Order is required.',
        'order_in' => 'Order must be either "desc" or "asc".',
        'status_required' => 'Status is required.',
        'status_in' => 'Status must be either "all", "settled" or "not-settled".',
        'priority_level_required' => 'Priority level is required.',
        'priority_level_in' => 'Priority level must be either "all", "low", "medium" or "high".',
        'type_date_required' => 'Date type is required.',
        'type_date_in' => 'Date type must be either "all", "day", "week", "month" or "year".',
        'day_date' => 'The day must be a valid date.',
        'day_before_or_equal' => 'The day must be a date before or equal to today.',
        'week_regex' => 'The week must be in a valid format.',
        'week_before_or_equal' => 'The week must be before or equal to the current week.',
        'month_date_format' => 'The month must be in a valid format.',
        'month_before_or_equal' => 'The month must be before or equal to the current month.',
        'year_integer' => 'The year must be an integer.',
        'year_min' => 'The year must be greater than or equal to :min.',
        'year_max' => 'The year must be less than or equal to :max.',
        'invoice_only_one_field' => 'You can only fill in one search field (day, week, month, year or "all").',
        'day_required' => 'The day field is required when the date type is "day".',
        'week_required' => 'The week field is required when the date type is "week".',
        'month_required' => 'The month field is required when the date type is "month".',
        'year_required' => 'The year field is required when the date type is "year".',
    ]
];