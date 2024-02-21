<?php

function getStatusColorClass($status) {
        switch ($status) {
            case 'Active':
                return 'text-success';
            case 'Under Maintenance':
                return 'text-warning';
            case 'Under Renovation':
                return 'text-info';
            case 'Temporarily Closed':
                return 'text-secondary';
            case 'Permanently Closed':
                return 'text-danger';
            case 'Demolished':
                return 'text-dark';
            default:
                return '';
        }
    }