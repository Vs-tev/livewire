<?php

it('has test_user_accounts_can_be_deleted page', function () {
    $response = $this->get('/test_user_accounts_can_be_deleted');

    $response->assertStatus(200);
});
