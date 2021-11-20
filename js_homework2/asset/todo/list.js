import {Item} from "/js_homework2/asset/todo/item.js";

export class List
{
	isProgress;
	loading;
	itemListContainer;
	container;
	items;
	editingItem;

	constructor({container})
	{
		this.container = container;
		this.items = [];

		this.itemListContainer = document.createElement('div');
		this.itemListContainer.classList.add('calendar-items');

		this.loading = document.createElement('div');
		this.loading.classList.add('hidden');
		this.loading.innerText = 'Loading...';

		this.container.append(this.loading);

		this.container.append(this.itemListContainer);

		this.isProgress = false;
	}

	render()
	{
		this.load().then(({items}) => {
			if (Array.isArray(items))
			{
				items.forEach((itemData) => {
					this.items.push(this.createItem(itemData));
				});
			}

			this.renderItems();
		}).catch((result) => {
			console.error('Error trying to load items: ' + result);
		});

		this.container.append(this.renderActions());
	}

	createItem(itemData)
	{
		itemData.deleteButtonHandler = this.handleDeleteButtonClick.bind(this);
		itemData.editButtonHandler = this.handleEditButtonClick.bind(this);
		return new Item(itemData);
	}



	getIndexOfItem(item)
	{
		return this.editingItem=this.items.indexOf(item);
	}

	handleDeleteButtonClick(item)
	{
		const index = this.getIndexOfItem(item);
		if (index > -1)
		{
			this.items.splice(index, 1);
			this.save().then(() => {
				this.renderItems();
			}).catch((error) => {
				console.error('Error trying to delete item');
			})
		}
	}

	handleEditButtonClick(item)
	{
		const addInput = this.container.querySelector('[class="calendar-new-item-title"]');
		const index = this.getIndexOfItem(item);
		console.log(index);
		if (index > -1)
		{

			addInput.value=this.items[index].title;
			this.items[index].title=addInput.value;
			this.save().then(() => {
				this.renderItems();
			}).catch((error) => {
				console.error('Error trying to edit item');
			})
		}
	}

	renderItems()
	{
		this.itemListContainer.innerHTML = '';
		this.items.forEach((item) => {
			this.itemListContainer.append(item.render());
		});
	}



	renderActions()
	{
		const actionsContainer = document.createElement('div');
		const addContainer = document.createElement('div');
		const addInput = document.createElement('input');
		addInput.classList.add('calendar-new-item-title');

		const addButton = document.createElement('button');
		addButton.innerText = 'Add';
		addButton.addEventListener('click', this.handleAddButtonClick.bind(this));

		const applyEditButton = document.createElement('button');
		applyEditButton.id="2";
		applyEditButton.innerText = 'Apply edit';
		applyEditButton.addEventListener('click', this.handleApplyEditButtonClick.bind(this));

		addContainer.append(addInput);
		addContainer.append(addButton);
		addContainer.append(applyEditButton);
		actionsContainer.append(addContainer);

		return actionsContainer;
	}

	handleApplyEditButtonClick()
	{
		console.log(this.editingItem);
		const editInput = this.container.querySelector('[class="calendar-new-item-title"]');
		if (editInput)
		{
			if (editInput.value.length === 0)
			{
				return;
			}
			this.items[this.editingItem].title=editInput.value;
			editInput.value='';
			this.save().then(() => {
				this.renderItems();
			}).catch((error) => {
				console.error('Error trying edit items: ' + error);
			});
		}
	}
	handleAddButtonClick()
	{
		const addInput = this.container.querySelector('[class="calendar-new-item-title"]');
		if (addInput)
		{
			if (addInput.value.length === 0)
			{
				return;
			}
			this.items.push(this.createItem({title: addInput.value}));
			addInput.value='';
			this.save().then(() => {
				this.renderItems();
			}).catch((error) => {
				console.error('Error trying save items: ' + error);
			});
		}
	}


	load()
	{
		return new Promise((resolve, reject) => {
			if (this.isProgress)
			{
				reject('Another action in progress');
				return;
			}
			this.startProgress();
			return fetch(
				'/js_homework2/ajax.php?action=load',
				{
					method: "POST",
				}
			).then((response) => {
				return response.json();
			}).then((result) => {
				if (result.error)
				{
					reject(result.error);
					return;
				}
				resolve(result);
			}).catch((result) => {
				reject(result);
			}).finally(() => {
				this.stopProgress()
			});
		});
	}

	save()
	{
		return new Promise((resolve, reject) => {
			if (this.isProgress)
			{
				reject('Another action in progress');
				return;
			}
			this.startProgress();
			const data = {
				items: []
			};
			this.items.forEach((item) => {
				data.items.push(item.getData());
			});

			return fetch(
				'/js_homework2/ajax.php?action=save',
				{
					method: "POST",
					headers: {
						'Content-Type': 'application/json;charset=utf-8'
					},
					body: JSON.stringify(data)
				}
			).then((response) => {
				return response.json();
			}).then((result) => {
				if (result.error)
				{
					reject(result.error);
					return;
				}

				resolve(result);
			}).catch((result) => {
				reject(result);
			}).finally(() => {
				this.stopProgress()
			});
		});
	}

	startProgress()
	{
		this.loading.classList.remove('hidden');
		this.isProgress = true;
	}

	stopProgress()
	{
		this.loading.classList.add('hidden');
		this.isProgress = false;
	}
}