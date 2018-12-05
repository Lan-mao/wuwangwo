(function () {
    'use strict';

    var $listItem = CKEDITOR.dtd.$listItem,
        $list = CKEDITOR.dtd.$list,
        TRISTATE_DISABLED = CKEDITOR.TRISTATE_DISABLED,
        TRISTATE_OFF = CKEDITOR.TRISTATE_OFF,
        TRISTATE_ON = CKEDITOR.TRISTATE_ON;

    CKEDITOR.plugins.add('firstlineindent', {
        // jscs:disable maximumLineLength
        lang: 'af,ar,az,bg,bn,bs,ca,cs,cy,da,de,de-ch,el,en,en-au,en-ca,en-gb,eo,es,es-mx,et,eu,fa,fi,fo,fr,fr-ca,gl,gu,he,hi,hr,hu,id,is,it,ja,ka,km,ko,ku,lt,lv,mk,mn,ms,nb,nl,no,oc,pl,pt,pt-br,ro,ru,si,sk,sl,sq,sr,sr-latn,sv,th,tr,tt,ug,uk,vi,zh,zh-cn', // %REMOVE_LINE_CORE%
        // jscs:enable maximumLineLength
        icons: 'firstlineindent', // %REMOVE_LINE_CORE%
        hidpi: true, // %REMOVE_LINE_CORE%

        init: function (editor) {
            var genericDefinition = CKEDITOR.plugins.firstlineindent.genericDefinition;
            var globalHelpers = CKEDITOR.plugins.firstlineindent;

            // Register generic commands.
            setupGenericListeners
            (editor, editor.addCommand('firstlineindent', new genericDefinition(true)));

            // Create and register toolbar button if possible.
            if (editor.ui.addButton) {
                editor.ui.addButton('Firstlineindent', {
                    label: editor.lang.firstlineindent.firstlineindent,
                    command: 'firstlineindent',
                    directional: true,
                    toolbar: 'indent,30'
                });
            }

            var classes = "first-line-indent-2";

            // Register commands.
            globalHelpers.registerCommands(editor, {
                firstlineindent: new commandDefinition(editor, 'firstlineindent',),
            });

            function commandDefinition() {
                globalHelpers.specificDefinition.apply(this, arguments);

                this.allowedContent = {
                    'p': {
                        // Do not add elements, but only text-align style if element is validated by other rule.
                        propertiesOnly: true,
                        styles: !classes ? 'margin-left,margin-right' : null,
                        classes: classes || null
                    }
                };

                this.contentTransformations = [
                    ['div: splitMarginShorthand'],
                    ['h1: splitMarginShorthand'],
                    ['h2: splitMarginShorthand'],
                    ['h3: splitMarginShorthand'],
                    ['h4: splitMarginShorthand'],
                    ['h5: splitMarginShorthand'],
                    ['h6: splitMarginShorthand'],
                    ['ol: splitMarginShorthand'],
                    ['p: splitMarginShorthand'],
                    ['pre: splitMarginShorthand'],
                    ['ul: splitMarginShorthand']
                ];

                if (this.enterBr)
                    this.allowedContent.div = true;

                this.requiredContent = (this.enterBr ? 'div' : 'p') +
                    (classes ? '(' + classes + ')' : '{margin-left}');

                this.jobs = {
                    '20': {
                        refresh: function (editor, path) {
                            var firstBlock = path.block || path.blockLimit;

                            // Switch context from somewhere inside list item to list item,
                            // if not found just assign self (doing nothing).
                            if (!firstBlock.is($listItem)) {
                                var ascendant = firstBlock.getAscendant($listItem);

                                firstBlock = (ascendant && path.contains(ascendant)) || firstBlock;
                            }

                            // Switch context from list item to list
                            // because indentblock can indent entire list
                            // but not a single list element.

                            if (firstBlock.is($listItem))
                                firstBlock = firstBlock.getParent();

                            //	[-] Context in the path or ENTER_BR
                            //
                            //		Don't try to indent if the element is out of
                            //		this plugin's scope. This assertion is omitted
                            //		if ENTER_BR is in use since there may be no block
                            //		in the path.

                            if (!this.enterBr && !this.getContext(path))
                                return TRISTATE_DISABLED;

                            else if (classes) {

                                //	[+] Context in the path or ENTER_BR
                                //	[+] IndentClasses
                                //
                                //		If there are indentation classes, check if reached
                                //		the highest level of indentation. If so, disable
                                //		the command.

                                if (indentClassLeft.call(this, firstBlock, classes))
                                    return TRISTATE_ON;
                                else
                                    return TRISTATE_OFF;
                            } else {

                                //	[+] Context in the path or ENTER_BR
                                //	[-] IndentClasses
                                //	[+] Indenting
                                //
                                //		No indent-level limitations due to indent classes.
                                //		Indent-like command can always be executed.

                                if (this.isFirstlineindent)
                                    return TRISTATE_OFF;

                                //	[+] Context in the path or ENTER_BR
                                //	[-] IndentClasses
                                //	[-] Indenting
                                //	[-] Block in the path
                                //
                                //		No block in path. There's no element to apply indentation
                                //		so disable the command.

                                else if (!firstBlock)
                                    return TRISTATE_DISABLED;

                                //	[+] Context in the path or ENTER_BR
                                //	[-] IndentClasses
                                //	[-] Indenting
                                //	[+] Block in path.
                                //
                                //		Not using indentClasses but there is firstBlock.
                                //		We can calculate current indentation level and
                                //		try to increase/decrease it.

                                else {
                                    return CKEDITOR[
                                        (getIndent(firstBlock) || 0) <= 0 ? 'TRISTATE_DISABLED' : 'TRISTATE_OFF'
                                        ];
                                }
                            }
                        },

                        exec: function (editor) {
                            var selection = editor.getSelection(),
                                range = selection && selection.getRanges()[0],
                                nearestListBlock;

                            // If there's some list in the path, then it will be
                            // a full-list indent by increasing or decreasing margin property.
                            if ((nearestListBlock = editor.elementPath().contains($list)))
                            // indentElement.call(this, nearestListBlock, classes);
                                var a = 1;

                            // If no list in the path, use iterator to indent all the possible
                            // paragraphs in the range, creating them if necessary.
                            else {
                                var iterator = range.createIterator(),
                                    enterMode = editor.config.enterMode,
                                    block;

                                iterator.enforceRealBlocks = true;
                                iterator.enlargeBr = enterMode != CKEDITOR.ENTER_BR;

                                while ((block = iterator.getNextParagraph(enterMode ==
                                CKEDITOR.ENTER_P ? 'p' : 'div'))) {
                                    if (!block.isReadOnly())
                                        indentElement.call(this, block, classes);
                                }
                            }

                            return true;
                        }
                    }
                };
            }


            // Register dirChanged listener.
            editor.on('dirChanged', function (evt) {
                var range = editor.createRange(),
                    dataNode = evt.data.node;

                range.setStartBefore(dataNode);
                range.setEndAfter(dataNode);

                var walker = new CKEDITOR.dom.walker(range),
                    node;

                while ((node = walker.next())) {
                    if (node.type == CKEDITOR.NODE_ELEMENT) {
                        // A child with the defined dir is to be ignored.
                        if (!node.equals(dataNode) && node.getDirection()) {
                            range.setStartAfter(node);
                            walker = new CKEDITOR.dom.walker(range);
                            continue;
                        }

                        // Switch alignment classes.
                        var classes = editor.config.indentClasses;
                        if (classes) {
                            var suffix = (evt.data.dir == 'ltr') ? ['_rtl', ''] : ['', '_rtl'];
                            for (var i = 0; i < classes.length; i++) {
                                if (node.hasClass(classes[i] + suffix[0])) {
                                    node.removeClass(classes[i] + suffix[0]);
                                    node.addClass(classes[i] + suffix[1]);
                                }
                            }
                        }

                        // Switch the margins.
                        var marginLeft = node.getStyle('margin-right'),
                            marginRight = node.getStyle('margin-left');

                        marginLeft ? node.setStyle('margin-left', marginLeft) : node.removeStyle('margin-left');
                        marginRight ? node.setStyle('margin-right', marginRight) : node.removeStyle('margin-right');
                    }
                }
            });


            CKEDITOR.tools.extend(commandDefinition.prototype, globalHelpers.specificDefinition.prototype, {
                // Elements that, if in an elementpath, will be handled by this
                // command. They restrict the scope of the plugin.
                context: {
                    p: 1,
                },

                // A regex built on config#indentClasses to detect whether an
                // element has some indentClass or not.
                classNameRegex: classes ? new RegExp('(?:^|\\s+)(' + classes + ')(?=$|\\s)') : null
            });
        }
    });

    /**
     * Global command class definitions and global helpers.
     *
     * @class
     * @singleton
     */
    CKEDITOR.plugins.firstlineindent = {
        /**
         * A base class for a generic command definition, responsible mainly for creating
         * Increase Indent and Decrease Indent toolbar buttons as well as for refreshing
         * UI states.
         *
         * Commands of this class do not perform any indentation by themselves. They
         * delegate this job to content-specific indentation commands (i.e. indentlist).
         *
         * @class CKEDITOR.plugins.indent.genericDefinition
         * @extends CKEDITOR.commandDefinition
         * @param {CKEDITOR.editor} editor The editor instance this command will be
         * applied to.
         * @param {String} name The name of the command.
         * @param {Boolean} [isFirstlineindent] Defines the command as indenting or outdenting.
         */
        genericDefinition: function (isFirstlineindent) {
            /**
             * Determines whether the command belongs to the indentation family.
             * Otherwise it is assumed to be an outdenting command.
             *
             * @readonly
             * @property {Boolean} [=false]
             */
            this.isFirstlineindent = !!isFirstlineindent;

            // Mimic naive startDisabled behavior for outdent.
            this.startDisabled = !this.isFirstlineindent;
        },

        /**
         * A base class for specific indentation command definitions responsible for
         * handling a pre-defined set of elements i.e. indentlist for lists or
         * indentblock for text block elements.
         *
         * Commands of this class perform indentation operations and modify the DOM structure.
         * They listen for events fired by {@link CKEDITOR.plugins.indent.genericDefinition}
         * and execute defined actions.
         *
         * **NOTE**: This is not an {@link CKEDITOR.command editor command}.
         * Context-specific commands are internal, for indentation system only.
         *
         * @class CKEDITOR.plugins.indent.specificDefinition
         * @param {CKEDITOR.editor} editor The editor instance this command will be
         * applied to.
         * @param {String} name The name of the command.
         * @param {Boolean} [isFirstlineindent] Defines the command as indenting or outdenting.
         */
        specificDefinition: function (editor, name, isFirstlineindent) {
            this.name = name;
            this.editor = editor;

            /**
             * An object of jobs handled by the command. Each job consists
             * of two functions: `refresh` and `exec` as well as the execution priority.
             *
             *    * The `refresh` function determines whether a job is doable for
             *      a particular context. These functions are executed in the
             *      order of priorities, one by one, for all plugins that registered
             *      jobs. As jobs are related to generic commands, refreshing
             *      occurs when the global command is firing the `refresh` event.
             *
             *      **Note**: This function must return either {@link CKEDITOR#TRISTATE_DISABLED}
             *      or {@link CKEDITOR#TRISTATE_OFF}.
             *
             *    * The `exec` function modifies the DOM if possible. Just like
             *      `refresh`, `exec` functions are executed in the order of priorities
             *      while the generic command is executed. This function is not executed
             *      if `refresh` for this job returned {@link CKEDITOR#TRISTATE_DISABLED}.
             *
             *      **Note**: This function must return a Boolean value, indicating whether it
             *      was successful. If a job was successful, then no other jobs are being executed.
             *
             * Sample definition:
             *
             *        command.jobs = {
			 *			// Priority = 20.
			 *			'20': {
			 *				refresh( editor, path ) {
			 *					if ( condition )
			 *						return CKEDITOR.TRISTATE_OFF;
			 *					else
			 *						return CKEDITOR.TRISTATE_DISABLED;
			 *				},
			 *				exec( editor ) {
			 *					// DOM modified! This was OK.
			 *					return true;
			 *				}
			 *			},
			 *			// Priority = 60. This job is done later.
			 *			'60': {
			 *				// Another job.
			 *			}
			 *		};
             *
             * For additional information, please check comments for
             * the `setupGenericListeners` function.
             *
             * @readonly
             * @property {Object} [={}]
             */
            this.jobs = {};

            /**
             * Determines whether the editor that the command belongs to has
             * {@link CKEDITOR.config#enterMode config.enterMode} set to {@link CKEDITOR#ENTER_BR}.
             *
             * @readonly
             * @see CKEDITOR.config#enterMode
             * @property {Boolean} [=false]
             */
            this.enterBr = editor.config.enterMode == CKEDITOR.ENTER_BR;

            /**
             * Determines whether the command belongs to the indentation family.
             * Otherwise it is assumed to be an outdenting command.
             *
             * @readonly
             * @property {Boolean} [=false]
             */
            this.isFirstlineindent = !!isFirstlineindent;

            /**
             * The name of the global command related to this one.
             *
             * @readonly
             */
            // this.relatedGlobal = isIndent ? 'indent' : 'outdent';
            this.relatedGlobal = 'firstlineindent';

            /**
             * A keystroke associated with this command (*Tab* or *Shift+Tab*).
             *
             * @readonly
             */
            // this.indentKey = isIndent ? 9 : CKEDITOR.SHIFT + 9;

            /**
             * Stores created markers for the command so they can eventually be
             * purged after the `exec` function is run.
             */
            this.database = {};
        },

        /**
         * Registers content-specific commands as a part of the indentation system
         * directed by generic commands. Once a command is registered,
         * it listens for events of a related generic command.
         *
         *        CKEDITOR.plugins.indent.registerCommands( editor, {
		 *			'indentlist': new indentListCommand( editor, 'indentlist' ),
		 *			'outdentlist': new indentListCommand( editor, 'outdentlist' )
		 *		} );
         *
         * Content-specific commands listen for the generic command's `exec` and
         * try to execute their own jobs, one after another. If some execution is
         * successful, `evt.data.done` is set so no more jobs (commands) are involved.
         *
         * Content-specific commands also listen for the generic command's `refresh`
         * and fill the `evt.data.states` object with states of jobs. A generic command
         * uses this data to determine its own state and to update the UI.
         *
         * @member CKEDITOR.plugins.indent
         * @param {CKEDITOR.editor} editor The editor instance this command is
         * applied to.
         * @param {Object} commands An object of {@link CKEDITOR.command}.
         */
        registerCommands: function (editor, commands) {
            editor.on('pluginsLoaded', function () {
                for (var name in commands) {
                    (function (editor, command) {
                        var relatedGlobal = editor.getCommand(command.relatedGlobal);

                        for (var priority in command.jobs) {
                            // Observe generic exec event and execute command when necessary.
                            // If the command was successfully handled by the command and
                            // DOM has been modified, stop event propagation so no other plugin
                            // will bother. Job is done.
                            relatedGlobal.on('exec', function (evt) {
                                if (evt.data.done)
                                    return;

                                // Make sure that anything this command will do is invisible
                                // for undoManager. What undoManager only can see and
                                // remember is the execution of the global command (relatedGlobal).
                                editor.fire('lockSnapshot');

                                if (command.execJob(editor, priority))
                                    evt.data.done = true;

                                editor.fire('unlockSnapshot');

                                // Clean up the markers.
                                CKEDITOR.dom.element.clearAllMarkers(command.database);
                            }, this, null, priority);

                            // Observe generic refresh event and force command refresh.
                            // Once refreshed, save command state in event data
                            // so generic command plugin can update its own state and UI.
                            relatedGlobal.on('refresh', function (evt) {
                                if (!evt.data.states)
                                    evt.data.states = {};

                                evt.data.states[command.name + '@' + priority] =
                                    command.refreshJob(editor, priority, evt.data.path);
                            }, this, null, priority);
                        }

                        // Since specific indent commands have no UI elements,
                        // they need to be manually registered as a editor feature.
                        editor.addFeature(command);
                    })(this, commands[name]);
                }
            });
        }
    };

    CKEDITOR.plugins.firstlineindent.genericDefinition.prototype = {
        context: 'p',

        exec: function () {
        }
    };

    CKEDITOR.plugins.firstlineindent.specificDefinition.prototype = {
        /**
         * Executes the content-specific procedure if the context is correct.
         * It calls the `exec` function of a job of the given `priority`
         * that modifies the DOM.
         *
         * @param {CKEDITOR.editor} editor The editor instance this command
         * will be applied to.
         * @param {Number} priority The priority of the job to be executed.
         * @returns {Boolean} Indicates whether the job was successful.
         */
        execJob: function (editor, priority) {
            var job = this.jobs[priority];

            if (job.state != TRISTATE_DISABLED)
                return job.exec.call(this, editor);
        },

        /**
         * Calls the `refresh` function of a job of the given `priority`.
         * The function returns the state of the job which can be either
         * {@link CKEDITOR#TRISTATE_DISABLED} or {@link CKEDITOR#TRISTATE_OFF}.
         *
         * @param {CKEDITOR.editor} editor The editor instance this command
         * will be applied to.
         * @param {Number} priority The priority of the job to be executed.
         * @returns {Number} The state of the job.
         */
        refreshJob: function (editor, priority, path) {
            var job = this.jobs[priority];

            if (!editor.activeFilter.checkFeature(this))
                job.state = TRISTATE_DISABLED;
            else
                job.state = job.refresh.call(this, editor, path);

            return job.state;
        },

        /**
         * Checks if the element path contains the element handled
         * by this indentation command.
         *
         * @param {CKEDITOR.dom.elementPath} node A path to be checked.
         * @returns {CKEDITOR.dom.element}
         */
        getContext: function (path) {
            return path.contains(this.context);
        }
    };

    /**
     * Attaches event listeners for this generic command. Since the indentation
     * system is event-oriented, generic commands communicate with
     * content-specific commands using the `exec` and `refresh` events.
     *
     * Listener priorities are crucial. Different indentation phases
     * are executed with different priorities.
     *
     * For the `exec` event:
     *
     *    * 0: Selection and bookmarks are saved by the generic command.
     *    * 1-99: Content-specific commands try to indent the code by executing
     *      their own jobs ({@link CKEDITOR.plugins.indent.specificDefinition#jobs}).
     *    * 100: Bookmarks are re-selected by the generic command.
     *
     * The visual interpretation looks as follows:
     *
     *          +------------------+
     *          | Exec event fired |
     *          +------ + ---------+
     *                  |
     *                0 -<----------+ Selection and bookmarks saved.
     *                  |
     *                  |
     *               25 -<---+ Exec 1st job of plugin#1 (return false, continuing...).
     *                  |
     *                  |
     *               50 -<---+ Exec 1st job of plugin#2 (return false, continuing...).
     *                  |
     *                  |
     *               75 -<---+ Exec 2nd job of plugin#1 (only if plugin#2 failed).
     *                  |
     *                  |
     *              100 -<-----------+ Re-select bookmarks, clean-up.
     *                  |
     *        +-------- v ----------+
     *        | Exec event finished |
     *        +---------------------+
     *
     * For the `refresh` event:
     *
     *    * <100: Content-specific commands refresh their job states according
     *      to the given path. Jobs save their states in the `evt.data.states` object
     *      passed along with the event. This can be either {@link CKEDITOR#TRISTATE_DISABLED}
     *      or {@link CKEDITOR#TRISTATE_OFF}.
     *    * 100: Command state is determined according to what states
     *      have been returned by content-specific jobs (`evt.data.states`).
     *      UI elements are updated at this stage.
     *
     *      **Note**: If there is at least one job with the {@link CKEDITOR#TRISTATE_OFF} state,
     *      then the generic command state is also {@link CKEDITOR#TRISTATE_OFF}. Otherwise,
     *      the command state is {@link CKEDITOR#TRISTATE_DISABLED}.
     *
     * @param {CKEDITOR.command} command The command to be set up.
     * @private
     */
    function setupGenericListeners(editor, command) {
        var selection, bookmarks;

        // Set the command state according to content-specific
        // command states.
        command.on('refresh', function (evt) {
            // If no state comes with event data, disable command.
            var states = [TRISTATE_DISABLED];

            for (var s in evt.data.states)
                states.push(evt.data.states[s]);

            this.setState(CKEDITOR.tools.search(states, TRISTATE_OFF) ? TRISTATE_OFF :
                (CKEDITOR.tools.search(states, TRISTATE_ON) ? TRISTATE_ON : TRISTATE_DISABLED));
        }, command, null, 100);

        // Initialization. Save bookmarks and mark event as not handled
        // by any plugin (command) yet.
        command.on('exec', function (evt) {
            selection = editor.getSelection();
            bookmarks = selection.createBookmarks(1);

            // Mark execution as not handled yet.
            if (!evt.data)
                evt.data = {};

            evt.data.done = false;
        }, command, null, 0);

        // Housekeeping. Make sure selectionChange will be called.
        // Also re-select previously saved bookmarks.
        command.on('exec', function () {
            editor.forceNextSelectionCheck();
            selection.selectBookmarks(bookmarks);
        }, command, null, 100);
    }


    // Method that checks if current indentation level for an element
    // reached the limit determined by config#indentClasses.
    function indentClassLeft(node, classes) {
        var indentClass = node.$.className.match(this.classNameRegex),
            isFirstlineindent = this.isFirstlineindent;

        // If node has one of the indentClasses:
        //	* If it holds the topmost indentClass, then
        //	  no more classes have left.
        //	* If it holds any other indentClass, it can use the next one
        //	  or the previous one.
        //	* Outdent is always possible. We can remove indentClass.
        if (indentClass)
            return true;

        // If node has no class which belongs to indentClasses,
        // then it is at 0-level. It can be indented but not outdented.
        else
            return false;
    }

    // Generic indentation procedure for indentation of any element
    // either with margin property or config#indentClass.
    function indentElement(element, classes, dir) {
        if (element.getCustomData('indent_processed'))
            return;

        var editor = this.editor,
            isFirstlineindent = this.isFirstlineindent;

        if (classes) {

            var indentClass = element.$.className.match(this.classNameRegex);

            if (indentClass) {
                element.$.className = CKEDITOR.tools.ltrim(element.$.className.replace(this.classNameRegex, ''));
            } else {
                element.addClass(classes);
            }


            // Transform current class f to indent step index.
            /* var indentClass = element.$.className.match(this.classNameRegex),
                 indentStep = 0;

             if (indentClass) {
                 indentClass = indentClass[1];
                 indentStep = CKEDITOR.tools.indexOf(classes, indentClass) + 1;
             }

             // Operate on indent step index, transform indent step index
             // back to class name.
             if ((indentStep += isIndent ? 1 : -1) < 0)
                 return;

             indentStep = Math.min(indentStep, classes.length);
             indentStep = Math.max(indentStep, 0);
             element.$.className = CKEDITOR.tools.ltrim(element.$.className.replace(this.classNameRegex, ''));

             if (indentStep > 0)
                 element.addClass(classes[indentStep - 1]);*/
        } else {
            var indentCssProperty = getIndentCss(element, dir),
                currentOffset = parseInt(element.getStyle(indentCssProperty), 10),
                indentOffset = editor.config.indentOffset || 40;

            if (isNaN(currentOffset))
                currentOffset = 0;

            currentOffset += (isIndent ? 1 : -1) * indentOffset;

            if (currentOffset < 0)
                return;

            currentOffset = Math.max(currentOffset, 0);
            currentOffset = Math.ceil(currentOffset / indentOffset) * indentOffset;

            element.setStyle(
                indentCssProperty,
                currentOffset ? currentOffset + (editor.config.indentUnit || 'px') : ''
            );

            if (element.getAttribute('style') === '')
                element.removeAttribute('style');
        }

        CKEDITOR.dom.element.setMarker(this.database, element, 'indent_processed', 1);

        return;
    }

})();
