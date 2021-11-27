<?php
class FinancialTransactionsRuTest extends \PHPUnit\Framework\TestCase
{
	public function getValidateFailSamples(): array
	{
		return [
			'empty' => [
				[],
			],
			'filled but empty' => [
				[
					'Name' => '',
					'PersonalAcc' => '',
					'BankName' => '',
					'BIC' => '',
					'CorrespAcc' => '',
				]
			],
		];
	}

	public function getValidateFailSamplesInvalidType(): array
	{
		return [
			'empty' => [
				[],
			],
			'filled but empty' => [
				[
					'Name' => '',
					'PersonalAcc' => '',
					'BankName' => '',
					'BIC' => '',
					'CorrespAcc' => [
						'a'=>''
					],
				]
			],
		];
	}

	/**
	 * @dataProvider getValidateFailSamples
	 *
	 * @param array $fields
	 */
	public function testValidateFail(array $fields): void
	{
		$dataGenerator = new \App\DataGenerator\FinancialTransactionsRu();

		$dataGenerator->setFields($fields);

		$result = $dataGenerator->validate();

		static::assertFalse($result->isSuccess());
	}

	public function testThatValidateSuccess(): void
	{
		$dataGenerator = new \App\DataGenerator\FinancialTransactionsRu();

		$dataGenerator->setFields([]);

		$dataGenerator
			->setName('Name')
			->setBIC('BIC')
			->setBankName('BankName')
			->setCorrespondentAccount('CorrespondentAccount')
			->setPersonalAccount('CorrespondentAccount')
		;
		$result = $dataGenerator->validate();
		static::assertTrue($result->isSuccess());
	}
	public function testGetData(): void
	{
		$dataGenerator = new \App\DataGenerator\FinancialTransactionsRu();

		$dataGenerator->setFields([]);

		$data = $dataGenerator->getData();

		static::assertEquals('ST00012|Name=|PersonalAcc=|BankName=|BIC=|CorrespAcc=', $data);
	}
	/**
	 * @dataProvider getValidateFailSamplesInvalidType
	 *
	 * @param array $fields
	 */
	public function testValidateFailBecauseOfInvalidType(array $fields):void
	{
		$dataGenerator = new \App\DataGenerator\FinancialTransactionsRu();
		$dataGenerator->setFields($fields);
		$result = $dataGenerator->validate();
		static::assertFalse($result->isSuccess());
	}
	public function testValidateFailBecauseOfInvalidLength(): void
	{
		$dataGenerator = new \App\DataGenerator\FinancialTransactionsRu();
		$BIC="12345678910";
		$dataGenerator->setBIC($BIC);
		$result = $dataGenerator->validate();
		static::assertFalse($result->isSuccess());
	}


	public function testAddFields(): void
	{
		$dataGenerator = new \App\DataGenerator\FinancialTransactionsRu();
		$new_field=[
			'password'=>'qwerty123'
		];
		$a=$dataGenerator->addFields($new_field)->getData();
		static::assertEquals('ST00012|Name=|PersonalAcc=|BankName=|BIC=|CorrespAcc=|password=qwerty123',$a);
	}

	public function testSetName(): void//помню, что можно сэттеры не покрывать, но я больше для себя
	{
		$dataGenerator = new \App\DataGenerator\FinancialTransactionsRu();
		$data_Name=$dataGenerator->setFields([])->setName('Nikita')->getData();
		static::assertEquals('ST00012|Name=Nikita|PersonalAcc=|BankName=|BIC=|CorrespAcc=',$data_Name);
	}
}
