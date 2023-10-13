<?php

namespace App\Models\Enums;

enum RoleName:string
{
	case User = 'user';
	case Moderator = 'moderator';
	case Administrator = 'administrator';
}