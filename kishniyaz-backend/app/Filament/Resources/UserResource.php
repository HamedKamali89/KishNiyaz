<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Hash;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    
    protected static ?string $navigationLabel = 'کاربران';
    
    protected static ?string $modelLabel = 'کاربر';
    
    protected static ?string $pluralModelLabel = 'کاربران';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('اطلاعات کاربری')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('نام')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('email')
                            ->label('ایمیل')
                            ->email()
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),
                        Forms\Components\TextInput::make('phone')
                            ->label('شماره تلفن')
                            ->tel()
                            ->maxLength(20),
                        Forms\Components\TextInput::make('password')
                            ->label('رمز عبور')
                            ->password()
                            ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                            ->dehydrated(fn ($state) => filled($state))
                            ->required(fn (string $context): bool => $context === 'create')
                            ->maxLength(255),
                        Forms\Components\Select::make('role')
                            ->label('نقش')
                            ->options([
                                'customer' => 'مشتری',
                                'provider' => 'ارائه دهنده',
                                'admin' => 'مدیر',
                            ])
                            ->required(),
                        Forms\Components\Toggle::make('is_active')
                            ->label('فعال')
                            ->default(true),
                        Forms\Components\DateTimePicker::make('email_verified_at')
                            ->label('تاریخ تأیید ایمیل'),
                    ])
                    ->columns(2),
                
                Forms\Components\Section::make('اطلاعات تکمیلی')
                    ->schema([
                        Forms\Components\FileUpload::make('avatar')
                            ->label('تصویر پروفایل')
                            ->image()
                            ->directory('avatars')
                            ->maxSize(2048),
                        Forms\Components\Textarea::make('bio')
                            ->label('بیوگرافی')
                            ->rows(3)
                            ->columnSpanFull(),
                    ])
                    ->collapsible(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('avatar')
                    ->label('تصویر')
                    ->circular()
                    ->defaultImageUrl(url('/images/default-avatar.png')),
                Tables\Columns\TextColumn::make('name')
                    ->label('نام')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->label('ایمیل')
                    ->searchable()
                    ->sortable()
                    ->copyable()
                    ->copyMessage('ایمیل کپی شد'),
                Tables\Columns\TextColumn::make('phone')
                    ->label('تلفن')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('role')
                    ->label('نقش')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'customer' => 'مشتری',
                        'provider' => 'ارائه دهنده',
                        'admin' => 'مدیر',
                        default => $state,
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'admin' => 'danger',
                        'provider' => 'warning',
                        'customer' => 'success',
                        default => 'gray',
                    }),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('وضعیت')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger'),
                Tables\Columns\IconColumn::make('email_verified_at')
                    ->label('تأیید ایمیل')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-badge')
                    ->falseIcon('heroicon-o-x-mark')
                    ->trueColor('success')
                    ->falseColor('warning'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('تاریخ ثبت‌نام')
                    ->dateTime('Y/m/d H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('آخرین بروزرسانی')
                    ->dateTime('Y/m/d H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('role')
                    ->label('نقش')
                    ->options([
                        'customer' => 'مشتری',
                        'provider' => 'ارائه دهنده',
                        'admin' => 'مدیر',
                    ]),
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('وضعیت فعال'),
                Tables\Filters\TernaryFilter::make('email_verified_at')
                    ->label('تأیید ایمیل')
                    ->nullable(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->paginated([10, 25, 50, 100]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
            'view' => Pages\ViewUser::route('/{record}'),
        ];
    }

    // Query optimization - فقط فیلدهای نیاز لیست
    // public static function getEloquentQuery(): \Illuminate\Database\Eloquent\Builder
    // {
    //    return parent::getEloquentQuery()
    //       ->select('id', 'name', 'email', 'phone', 'role', 'is_active', 'avatar', 'email_verified_at', 'created_at', 'updated_at');
    // }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'email', 'phone'];
    }
}
