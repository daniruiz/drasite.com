/* eslint-disable comma-dangle */
/* eslint-disable curly */

'use strict'

!(function (self, TetrisBoard) {
  typeof exports === 'object' && typeof module === 'object'
    ? module.exports = TetrisBoard
    : self.TetrisBoard = TetrisBoard
}(typeof self !== 'undefined' ? self : this, (() => {
  const BOARD_SIZE = {
    x: 10,
    y: 22,
  }

  return class TetrisBoard {
    constructor () {
      this.board = new Array(this.BOARD_SIZE.y)
      for (let y = 0; y < this.BOARD_SIZE.y; y++)
        this.board[y] = new Array(this.BOARD_SIZE.x)

      this.__score = 0
      this.__level = 0
    }

    get BOARD_SIZE () { return BOARD_SIZE }

    get level () { return Math.floor(this._level) }

    get _level () { return this.__level }

    set _level (level) {
      const previousLevel = this.level
      this.__level = level
      if (previousLevel !== this.level)
        this._updateInfo()
    }

    get score () { return this._score }

    get _score () { return Math.floor(this.__score) }

    set _score (score) {
      if (score === this.__score)
        return
      this.__score = score
      this._updateInfo()
    }

    get nextPieceType () { return this.__nextPieceType }

    set _nextPieceType (type) {
      this.__nextPieceType = type
      this._updateInfo()
    }

    set onGameOver (callback) {
      if (typeof callback !== 'function')
        return
      this._gameOverCallback = callback
    }

    set onInfoChage (callback) {
      if (typeof callback !== 'function')
        return
      this._infoChangeCallback = callback
    }

    _updateInfo () {
      if (this._infoChangeCallback) {
        this._infoChangeCallback({
          level: this.level,
          score: this.score,
          nextPieceType: this.nextPieceType
        })
      }
    }

    _generateBlock (type, x, y) {
      const block = {
        currentPiece: true,
        type,
        x,
        y,
      }
      this._addVisualBlock(block)
      this._currentPiece.push(block)
      return block
    }

    _addVisualBlock (block) {}

    _deleteVisualBlock (block, i) {}

    _updateVisualBoard () {}

    _gameOver () {
      if (this._gameOverCallback)
        this._gameOverCallback()
    }
  }
})()))
/* eslint-disable comma-dangle */
/* eslint-disable curly */

'use strict'

!(function (self, Tetris) {
  typeof exports === 'object' && typeof module === 'object'
    ? module.exports = Tetris
    : self.Tetris = Tetris
}(typeof self !== 'undefined' ? self : this, (TetrisBoard => {
  const PIECES = {
    I: [
      '0000',
    ],
    O: [
      '00',
      '00',
    ],
    T: [
      '000',
      ' 0 ',
    ],
    J: [
      '000',
      '  0',
    ],
    L: [
      '000',
      '0  ',
    ],
    S: [
      ' 00',
      '00 ',
    ],
    Z: [
      '00 ',
      ' 00',
    ],
  }
  const INITIAL_SPEED = 1000
  const SPEED_MULTIPLIER = 0.9995
  const LEVEL_DIVIDER = 25

  return class Tetris extends TetrisBoard {
    constructor () {
      super()

      this._speed = INITIAL_SPEED
      this._currentPiece = []
    }

    static get INSTRUCTIONS () {
      return {
        LEFT: 'left',
        DOWN: 'down',
        RIGHT: 'right',
        ROTATE: 'rotate',
        TIMER: 'timer',
      }
    }

    start () {
      this._addNewPiece()

      const timer = () => setTimeout(() => {
        if (this._lockGame)
          return
        this._timerCallback()
        this._timer = timer()
      }, this._speed)
      timer()
    }

    execInstruction (instruction) {
      switch (instruction) {
        case Tetris.INSTRUCTIONS.LEFT:
          this.movePieceLeft()
          break
        case Tetris.INSTRUCTIONS.DOWN:
          this.movePieceDown()
          break
        case Tetris.INSTRUCTIONS.RIGHT:
          this.movePieceRight()
          break
        case Tetris.INSTRUCTIONS.ROTATE:
          this.rotatePiece()
          break
        case Tetris.INSTRUCTIONS.TIMER:
          this._timerCallback()
          break
      }
    }

    _timerCallback () {
      this.movePieceDown()
      this._updateLevel()
    }

    _updateLevel () {
      this._speed *= SPEED_MULTIPLIER
      this._level = (INITIAL_SPEED - this._speed) / LEVEL_DIVIDER + 1
    }

    movePieceDown () {
      if (this._lockGame) return

      const addNewPiece = this._currentPiece.reduce((addNewPiece, block) => addNewPiece ||
        block.y === 0 ||
        (!!this.board[block.y - 1][block.x] && !this.board[block.y - 1][block.x].currentPiece)
      , false)

      if (addNewPiece) {
        const currentPieceRow = this._currentPiece.reduce((maxY, block) => Math.max(block.y, maxY), 0)
        if (currentPieceRow >= this.BOARD_SIZE.y - 2) {
          this._gameOver()
        } else {
          this._checkFullRows()
          this._addNewPiece()
        }
      } else {
        this._translateCurrentPiece(block => { block.y = block.y - 1 })
      }
    }

    movePieceLeft () { this._movePieceSide(Tetris.INSTRUCTIONS.LEFT) }

    movePieceRight () { this._movePieceSide(Tetris.INSTRUCTIONS.RIGHT) }

    _movePieceSide (side) {
      if (this._lockGame) return

      let xShift
      let hit
      if (side === Tetris.INSTRUCTIONS.RIGHT) {
        xShift = +1
        hit = this._currentPiece.reduce((hit, block) => hit ||
          block.x === this.BOARD_SIZE.x - 1 ||
          (!!this.board[block.y][block.x + xShift] && !this.board[block.y][block.x + xShift].currentPiece)
        , false)
      } else if (side === Tetris.INSTRUCTIONS.LEFT) {
        xShift = -1
        hit = this._currentPiece.reduce((hit, block) => hit ||
          block.x === 0 ||
          (!!this.board[block.y][block.x + xShift] && !this.board[block.y][block.x + xShift].currentPiece)
        , false)
      }

      if (!hit)
        this._translateCurrentPiece(block => { block.x = block.x + xShift })
    }

    rotatePiece () {
      if (this._lockGame) return

      const piecePosition = this._currentPiece.reduce((pos, block) => ({
        x: Math.min(block.x, pos.x),
        y: Math.max(block.y, pos.y),
      }), {
        x: this.BOARD_SIZE.x,
        y: 0,
      })
      const rotatedPieceProperties = this._currentPiece.reduce((properties, block) => ({
        height: Math.max(properties.height, (block.x - piecePosition.x + 1)),
        width: Math.max(properties.width, (piecePosition.y - block.y + 1)),
      }), {
        height: 0,
        width: 0,
      })
      const xShift = Math.min(0, Math.max(-2, (this.BOARD_SIZE.x - 1) - (piecePosition.x + rotatedPieceProperties.width - 1))) // Move piece left if it hits the wall after rotation
      let xRelativeAlign = Math.floor(rotatedPieceProperties.height / 2 - 1)
      if (piecePosition.x + xRelativeAlign < 0) xRelativeAlign = 0
      const rotatedPiece = this._currentPiece.map(block => Object.assign({
        x: block.x,
        y: block.y,
      }, {
        x: piecePosition.y - block.y + piecePosition.x + xShift + xRelativeAlign,
        y: block.x - piecePosition.x + piecePosition.y - (rotatedPieceProperties.height - 1),
      }))
      const hit = rotatedPiece.reduce((hit, block) => hit ||
          block.y < 0 ||
          block.x < 0 ||
          block.x > this.BOARD_SIZE.x - 1 ||
          (!!this.board[block.y][block.x] && !this.board[block.y][block.x].currentPiece)
      , false)

      if (!hit) {
        this._translateCurrentPiece((block, i) => {
          Object.assign(block, rotatedPiece[i])
          this.board[block.y][block.x] = block
        })
      }
    }

    _translateCurrentPiece (callback) {
      this._currentPiece.forEach(block => { this.board[block.y][block.x] = null })
      this._currentPiece.forEach((block, i) => {
        callback(block, i)
        this.board[block.y][block.x] = block
      })
      this._updateVisualBoard()
    }

    _checkFullRows () {
      const fullRowIndexes = []
      for (let y = 0; y < this.BOARD_SIZE.y; y++) {
        let fullRow = true
        for (let x = 0; x < this.BOARD_SIZE.x; x++)
          fullRow &= !!this.board[y][x]
        if (fullRow)
          fullRowIndexes.unshift(y)
      }
      fullRowIndexes.forEach(y => {
        this.board[y].forEach(this._deleteVisualBlock)
        this.board.splice(y, 1)
        this.board.push(new Array(this.BOARD_SIZE.x))
      })

      const multiplier = val => val < 1 ? 0 : val + multiplier(val - 1)
      this._score += multiplier(fullRowIndexes.length) * 100 * this._level
    }

    _addNewPiece () {
      const pieceType = this.nextPieceType || this._getRandomPieceType()

      this._currentPiece.forEach(block => { block.currentPiece = false })
      this._currentPiece = []
      this._nextPieceType = this._getRandomPieceType()

      const piece = PIECES[pieceType]
      const pieceWidth = piece[0].length
      const pieceHeight = piece.length
      const pieceOffset = Math.floor((this.BOARD_SIZE.x - pieceWidth) / 2)

      for (let y = 0; y < pieceHeight; y++) {
        for (let x = 0; x < pieceWidth; x++) {
          if (piece[y].charAt(x) !== ' ') {
            const blockX = pieceOffset + x
            const blockY = this.BOARD_SIZE.y - y - 1
            this.board[blockY][blockX] = this._generateBlock(pieceType, blockX, blockY)
          }
        }
      }

      this._updateVisualBoard()
    }

    _getRandomPieceType () {
      const pieceTypes = Object.keys(PIECES)
      return pieceTypes[Math.floor(Math.random() * pieceTypes.length)]
    }

    _gameOver () {
      this._lockGame = true
      clearTimeout(this._timer)
      super._gameOver()
    }
  }
})(typeof TetrisBoard !== 'undefined'
  ? TetrisBoard
  : require('./TetrisBoard'),
)))
/* eslint-disable comma-dangle */
/* eslint-disable curly */

'use strict'

class WebTetris extends Tetris {
  constructor (boardElement) {
    if (!(boardElement instanceof window.Element)) return

    super()

    this.boardElement = boardElement
    this.boardElement.classList.add('__tetris-container')
    this.boardElement.innerHTML = ''
    for (let i = 0; i < 4; i++)
      boardElement.appendChild(Object.assign(document.createElement('DIV'), { className: 'piece--next' }))
  }

  _addVisualBlock (block) {
    block.element = Object.assign(document.createElement('DIV'), { className: `piece--${block.type}` })
    this.boardElement.appendChild(block.element)
  }

  _deleteVisualBlock ({ element }, i) { setTimeout(() => element.remove(), i * 10) }

  _updateVisualBoard (block, x, y) {
    const BOARD_SIZE = this.BOARD_SIZE
    for (let y = 0; y < BOARD_SIZE.y; y++) {
      for (let x = 0; x < BOARD_SIZE.x; x++) {
        const block = this.board[y][x]
        if (block) {
          block.element.style.left = `${x * 100 / BOARD_SIZE.x}%`
          block.element.style.bottom = `${y * 100 / BOARD_SIZE.y}%`
        }
      }
    }
  }
}
/* eslint-disable comma-dangle */
/* eslint-disable curly */

'use strict'

class WebTetrisClient extends WebTetris {
  constructor (boardElement, url) {
    if (!(boardElement instanceof window.Element)) return

    super(boardElement)

    this._playing = false
    this._lockMessages = false

    this._webSocket = new WebSocket(url)
    this._webSocket.onerror = e => this._error(e)
    this._webSocket.onmessage = ({ data }) => {
      const message = JSON.parse(data)
      if (message.scores)
        this.scores = message.scores
      if (message.instruction)
        this.execInstruction(message.instruction)
      if (message.nextPieceType) {
        this._nextPieceType = message.nextPieceType
        if (!this._playing)
          this.start()
      }
    }
  }

  set onError (callback) {
    if (typeof callback !== 'function')
      return
    this._onErroCallback = callback
  }

  start () {
    this._addNewPiece()
    this._playing = true
  }

  stop () { this._webSocket.close() }

  _timerCallback () {
    this._lockMessages = true
    super._timerCallback()
    this._lockMessages = false
  }

  movePieceDown () {
    this._sendData({ instruction: Tetris.INSTRUCTIONS.DOWN })
    super.movePieceDown()
  }

  movePieceLeft () {
    this._sendData({ instruction: Tetris.INSTRUCTIONS.LEFT })
    super.movePieceLeft()
  }

  movePieceRight () {
    this._sendData({ instruction: Tetris.INSTRUCTIONS.RIGHT })
    super.movePieceRight()
  }

  rotatePiece () {
    this._sendData({ instruction: Tetris.INSTRUCTIONS.ROTATE })
    super.rotatePiece()
  }

  _sendData (data) {
    if (this._lockMessages) return
    this._webSocket.send(JSON.stringify(data))
  }

  saveScore (name) {
    if (this.score !== 0)
      this._sendData({ saveScoreName: name })
  }

  _error (e) {
    if (this._onErroCallback)
      this._onErroCallback()
    else
      console.error(e)
  }
}
